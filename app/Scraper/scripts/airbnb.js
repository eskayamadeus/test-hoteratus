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

    const roomDetails = await page.evaluate(() => {
        const name = document.querySelector("h1")?.textContent?.trim();

        const infoSection = Array.from(
            document.querySelectorAll("#site-content section div ol li.l7n4lsf")
        ).map((item) => item.textContent.trim());
        const capacity = infoSection.find((text) => text.includes("guest"));

        const bed_types = [infoSection.find((text) => text.includes("bed"))];

        const extra = infoSection.filter(
            (text) => !text.includes("guest") && !text.includes("bed")
        );

        const price = parseFloat(
            Array.from(
                document.querySelectorAll(
                    "[data-section-id=BOOK_IT_SIDEBAR] div div div div div div div div[aria-hidden] > span"
                )
            )
                .map((item) => item.textContent.trim())
                .filter((item) => item !== "night")[0]
                ?.replace(/US\$|\$|,|US/gi, "")
        );

        return { name, capacity, bed_types, extra, price, refundable: true };
    });

    console.log(JSON.stringify({status: 'SUCCESS', code: 200, headers: {}, data: [roomDetails]}));

    await browser.close();
})(process.argv[2], process.argv[3], process.argv[4]);
