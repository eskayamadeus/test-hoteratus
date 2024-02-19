import puppeteer from "puppeteer";

(async (url, environment, executablePath) => {
    const browser = await puppeteer.launch({
        executablePath,
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
    await page.setViewport({width: 1440, height: 768});

    await page.setUserAgent(
        "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36"
    );

    await page.goto(url, {waitUntil: "networkidle2"});

    try {
        await page.waitForFunction(function () {
            const offersButton = document.querySelector('[href="#Offers"]');

            if (!offersButton) {
                return true;
            }

            offersButton.click();

            if (document.querySelectorAll("div.uitk-layout-flex[data-stid^=property-offer]").length > 0) {
                return true;
            }

            return false;
        }, {timeout: 600})
    } catch (error) {}
    // const roomsButton = await page.$('[href="#Offers"]');
    // await roomsButton.click();

    await new Promise((resolve) => setTimeout(resolve, 2000));

    const roomListings = await page.evaluate(() => {
        return Array.from(
            document.querySelectorAll(
                "div.uitk-layout-flex[data-stid^=property-offer]"
            ),
            (e) => {
                let roomInfo = Array.from(e.querySelectorAll("ul li")).map(
                    (item) => item.textContent.trim()
                );

                let capacity = roomInfo.find((text) => text.includes("Sleep"));

                let bed_types = roomInfo.filter((text) => text.includes("Bed"));

                let extra = roomInfo.filter(
                    (text) => !text.includes("Sleep") && !text.includes("Bed")
                );

                let prices = Math.max(
                    ...Array.from(
                        e.querySelectorAll(
                            "[data-stid='price-summary'] span[aria-hidden=true]"
                        )
                    ).map((item) =>
                        parseFloat(
                            item.textContent
                                .trim()
                                .replace(/US\$|\$|,|US/gi, "")
                        )
                    )
                );

                let refundable = false;

                refundable =
                    Array.from(
                        e.querySelectorAll(
                            ".uitk-card-content-section fieldset.uitk-radio-button-group .uitk-radio-button-label-content"
                        )
                    )
                        .map((item) => item.textContent.trim().toLowerCase())
                        .filter((item) => item === "non-refundable").length > 0;

                if (!refundable) {
                    refundable =
                        Array.from(
                            e.querySelectorAll(
                                '[data-stid="highlightedMessages-*"]'
                            )
                        )
                            .map((item) =>
                                item.textContent.trim().toLowerCase()
                            )
                            .filter(
                                (item) =>
                                    item === "partially refundable" ||
                                    item === "refundable"
                            ).length > 0;
                }

                return {
                    name: e
                        .querySelector("h3.uitk-heading.uitk-heading-6")
                        ?.textContent?.trim(),
                    capacity,
                    extra,
                    bed_types,
                    price: Math.max(prices),
                    refundable,
                };
            }
        );
    });

    console.log(JSON.stringify({status: 'SUCCESS', code: 200, headers: {}, data: roomListings}));

    await browser.close();
})(process.argv[2], process.argv[3], process.argv[4]);
