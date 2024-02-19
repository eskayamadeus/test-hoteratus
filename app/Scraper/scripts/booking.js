import puppeteer from "puppeteer";

(async (url, environment, executablePath) => {
    const browser = await puppeteer.launch({
        executablePath: executablePath,
        headless: environment === "production",
        args: [
            "--no-sandbox",
            "--disable-setuid-sandbox",
            "--disable-dev-shm-usage",
            "--disable-accelerated-2d-canvas",
            "--no-first-run",
            "--no-zygote",
            "--single-process",
            "--disable-gpu",
        ],
    }); // Launch a headful browser for debugging
    const page = await browser.newPage();
    await page.setRequestInterception(true);

    page.on("request", (request) => {
        if (request.isInterceptResolutionHandled()) return
        if (["image"].indexOf(request.resourceType()) !== -1) {
            request.abort();
        } else {
            request.continue();
        }
    });

    page.on("response", (response) => {
        if (response.status() === 429 && response.url().includes('expedia.com')) {
            console.log(JSON.stringify({status: 'ERROR', code: response.status(), headers: response.headers(), data: null}));
            process.exit();
        }
    });

    // Emulate a human-like viewport and user agent
    await page.setViewport({ width: 1366, height: 768 });

    await page.setUserAgent(
        "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36"
    );

    await page.goto(url, { waitUntil: "networkidle2" });

    let noRoomListings = await page.evaluate(() =>
        Array.from(
            document.querySelectorAll(
                "#maxotelRoomArea .roomstable div:not(:first-child)"
            ),
            (e) => ({
                name: e.querySelector(".d1c4779e7a")?.textContent?.trim(),
                bed_types: Array.from(e.querySelectorAll(".f50370658e")).map(
                    (item) => item.textContent.trim()
                ),
                capacity: e.querySelector(".be781dfdd4")?.ariaLabel?.trim(),
            })
        )
    );

    let roomListings = await page.evaluate(() =>
        Array.from(
            document.querySelectorAll("#hprt-table tbody tr"),
            (element, index) => {
                let price = element
                    .querySelector(
                        "td.hprt-table-cell-price .bui-price-display__original"
                    )
                    ?.textContent.trim();

                if (price === undefined) {
                    price = element
                        .querySelector(
                            "td.hprt-table-cell-price .bui-price-display__value"
                        )
                        ?.textContent.trim();
                }

                if (price !== undefined) {
                    price = parseFloat(price.replace(/US\$|\$|,|US/gi, ""));
                }

                let capacity = element
                    .querySelector(
                        "td.hprt-table-cell-occupancy span.bui-u-sr-only"
                    )
                    ?.textContent?.trim();

                return {
                    name: element
                        .querySelector(
                            "td.hprt-table-cell-roomtype .hprt-roomtype-icon-link"
                        )
                        ?.textContent?.trim(),
                    bed_types: Array.from(
                        element.querySelectorAll(
                            "td.hprt-table-cell-roomtype .rt-bed-type, td.hprt-table-cell-roomtype .bedroom_bed_type"
                        )
                    ).map((item) => item.textContent.trim()),
                    capacity,
                    price: price,
                    refundable:
                        element.querySelector(".e2e-non-refundable") !==
                        undefined,
                };
            }
        )
    );

    console.log(JSON.stringify({status: 'SUCCESS', code: 200, headers: {}, data: [...roomListings, ...noRoomListings]}));

    await browser.close();
})(process.argv[2], process.argv[3], process.argv[4]);
