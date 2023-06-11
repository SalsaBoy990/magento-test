# Ecommsolvers Test exercise 1 - HTML5 Video Widget


## Installation

```bash
php bin/magento module:enable Gulacsi\EcommsolversWidget
php bin/magento setup:upgrade
```

## Example video url you can use

`https://res.cloudinary.com/dky4rnquj/video/upload/v1686408478/South_Pacific_Mother_Nature_tries_to_create_an_island_before_your_very_eyes_sijz89.mp4`

## Generate CSS and JS bundles

```bash
npm install
gulp watch
gulp styles
gulp scripts
```

Sources are in the `src/` folder

## TODO

- add control buttons with luma icons
- improve accessibility
- add more option to set aspect-ratio (currently 16x9 is supported): support 9x16 and 4:3 ratios too
- the id of the video element is hardcoded now -> maybe use some dynamic approach with an additional id field?
