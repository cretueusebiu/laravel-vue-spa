import express from 'express'
import puppeteer from 'puppeteer'
import cookieParser from 'cookie-parser'

const ignoreHeaders = [
  'host',
  'cookie'
]

async function ssr (browserWSEndpoint, url, headers = {}, cookies = {}) {
  const browser = await puppeteer.connect({ browserWSEndpoint })
  const context = await browser.createIncognitoBrowserContext()
  const page = await context.newPage()

  await page.setCookie(...Object.keys(cookies).map(key => ({
    name: key,
    value: cookies[key],
    url: url
  })))

  await page.setExtraHTTPHeaders({ ...headers, 'Headless-Chrome': '1' })

  const start = Date.now()

  try {
    await page.goto(url, { waitUntil: 'networkidle0' })
  } catch (err) {
    console.error(err)
    throw new Error('page.goto() timed out.')
  }

  const html = await page.content()

  await page.close()
  await context.close()

  const ttRenderMs = Date.now() - start

  return { html, ttRenderMs }
}

function startServer (port = 8081) {
  let browserWSEndpoint = null

  const app = express()

  app.use(cookieParser())

  app.get('/', async (req, res, next) => {
    if (!browserWSEndpoint) {
      const browser = await puppeteer.launch({
        headless: true
      })
      browserWSEndpoint = await browser.wsEndpoint()
    }

    if (!req.query.url) {
      return res.status(400).send('Missing url query parameter.')
    }

    console.log(`Url: ${req.query.url}`)

    const { html, ttRenderMs } = await ssr(browserWSEndpoint, req.query.url, getHeaders(req), req.cookies)

    res.set('Server-Timing', `Prerender;dur=${ttRenderMs};desc="Headless render time (ms)"`)

    return res.status(200).send(html)
  })

  app.listen(port, () => console.log(`Server started: http://localhost:${port}`))
}

function getHeaders (req) {
  return Object.keys(req.headers)
    .filter(header => !ignoreHeaders.includes(header))
    .reduce((acc, header) => ({ ...acc, [header]: req.headers[header] }), {})
}

startServer()
