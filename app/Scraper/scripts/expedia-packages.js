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

    await page.setViewport({ width: 1440, height: 768 });

    await page.setUserAgent(
        "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36 Edg/121.0.0.0"
    );

    await page.goto(url, {
        waitUntil: "networkidle2",
    });

    await loadHotels(page);

    const roomListings = await getHotelListings(page);

    console.log(JSON.stringify({status: 'SUCCESS', code: 200, headers: {}, data: roomListings}));

    await browser.close();
})(process.argv[2], process.argv[3], process.argv[4]);

async function loadHotels(page) {
    const hotelsTargetCount = 20;
    let previousDivCount = 0;
    let consecutiveErrors = 0;

    while (true) {
        try {
            await page.waitForFunction((hotelsTargetCount) => {
                return document.querySelectorAll(
                    "div.uitk-spacing.uitk-spacing-margin-blockstart-three div.uitk-card-content-section"
                ).length >= hotelsTargetCount
            }, {}, hotelsTargetCount);

            break;
        } catch (error) {
            consecutiveErrors++
            if (consecutiveErrors >= 3) {
                break;
            }
        }

        const getMoreButton = await page.$("[data-stid=show-more-results]");

        if (!getMoreButton) {
            break;
        }

        const currentDivCount = await page.evaluate(() => document.querySelectorAll("div.uitk-spacing.uitk-spacing-margin-blockstart-three div.uitk-card-content-section").length)
        if (currentDivCount === previousDivCount) {
            break;
        }

        previousDivCount = currentDivCount;

        getMoreButton.scrollIntoView();
        getMoreButton.click();
    }
}

async function getHotelListings (page) {
    return await page.evaluate(() => {
        return Array.from(
            document.querySelectorAll(
                "[data-stid=property-listing-results] div.uitk-spacing.uitk-spacing-margin-blockstart-three"
            )
        )
            .filter(
                (item) =>
                    item.querySelector("div.uitk-card-content-section") !== null
            )
            .filter(
                (item) =>
                    item.querySelector(
                        "div.uitk-card-content-section .uitk-price-strikethrough, div.uitk-card-content-section button[data-stid=disclaimer-dialog-link] span div.uitk-text, div.uitk-card-content-section span[data-stid=price-lockup-text], div.uitk-card-content-section [style*='--uitk-layoutgrid-column-start:span 1'] span[aria-hidden]"
                    ) !== null
            )
            .map((item) => {
                let price = parseFloat(
                    item
                        .querySelector(
                            "div.uitk-card-content-section .uitk-price-strikethrough, div.uitk-card-content-section button[data-stid=disclaimer-dialog-link] span div.uitk-text, div.uitk-card-content-section span[data-stid=price-lockup-text], div.uitk-card-content-section [style*='--uitk-layoutgrid-column-start:span 1'] span[aria-hidden]"
                        )
                        ?.textContent?.trim()
                        ?.replace(/US\$|\$|,|US/gi, "")
                );

                const urlLink = item.querySelector(
                    "a[data-stid=open-hotel-information]"
                )?.href;
                const url_id = urlLink?.substring(
                    urlLink?.lastIndexOf("/") + 1,
                    urlLink?.indexOf(".Hotel-Information")
                );
                return {
                    name: item
                        .querySelector("div.uitk-card-content-section h3")
                        ?.textContent?.trim(),
                    location: item
                        .querySelector(
                            "div.uitk-card-content-section div.uitk-text"
                        )
                        ?.textContent?.trim(),
                    price,
                    url_id,
                    urlLink,
                };
            });
    });
}
