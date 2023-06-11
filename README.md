# Ecommsolvers Magento Test Tasks

## Setup

- Use the master branch
- Import mysql dump to your database
- I used `magento.test` domain locally.

```bash
bin/magento config:set web/secure/base_url https://yourdomain.tld/
bin/magento config:set web/unsecure/base_url https://yourdomain.tld/
```


## Ecommsolvers Test exercise 1 - HTML5 Video Widget

### Installation

```bash
php bin/magento module:enable Gulacsi\EcommsolversWidget
php bin/magento setup:upgrade
```

### Example video url you can use

`https://res.cloudinary.com/dky4rnquj/video/upload/v1686408478/South_Pacific_Mother_Nature_tries_to_create_an_island_before_your_very_eyes_sijz89.mp4`

### Generate CSS and JS bundles (not needed - already done)

```bash
npm install
gulp watch
gulp styles
gulp scripts
```

Sources are in the `src/` folder


## Ecommsolvers Test exercise 2 - Export cart content to CSV file

### Installation

```bash
php bin/magento module:enable Gulacsi\EcommsolversCart
php bin/magento setup:upgrade
```

### Admin page

The setting to enable/disable cart download is at `Stores -> Configuration page -> Ecommsolvers tab`.

### Cart page

The CSV download link is just above the checkout button.
