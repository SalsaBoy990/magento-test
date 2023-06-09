# Ecommsolvers Test exercise 1 - HTML5 Video Widget


## Installation

```bash
php bin/magento module:enable Gulacsi\EcommsolversWidget
php bin/magento setup:upgrade
```

## Example video url you can use

`https://res.cloudinary.com/dky4rnquj/video/upload/v1661019242/example_ef96753deb.mp4`


## TODO

- add control buttons with luma icons
- improve accessibility
- add more option to set aspect-ratio (currently 16x9 is supported): support 9x16 and 4:3 ratios too
- the id of the video element is hardcoded now -> maybe use some dynamic approach with an additional id field?
