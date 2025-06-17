[![TYPO3 13](https://img.shields.io/badge/TYPO3-13-orange.svg)](https://get.typo3.org/version/13)

# TYPO3 Extension `mapgeoadmin`

This extension integrates an iFrame to display map data of the website https://map.geo.admin.ch and
uses Extbase & Fluid and the latest technologies of TYPO3 CMS.

|                  | URL                                        |
|------------------|--------------------------------------------|
| **Repository:**  | https://github.com/saccas/ext-mapgeoadmin  |

## Installation

* Just install this extension - e.g. `composer require saccas/mapgeoadmin` or download it or install it with the
classic way (Extension Manager)
* Clear caches

## Usage

Simply copy the url that you have on the website: https://map.geo.admin.ch, e.g.

> https://map.geo.admin.ch/?lang=en&topic=ech&bgLayer=ch.swisstopo.pixelkarte-farbe&layers=ch.swisstopo.zeitreihen,ch.bfs.gebaeude_wohnungs_register,ch.bav.haltestellen-oev,ch.swisstopo.swisstlm3d-wanderwege&layers_visibility=false,false,true,false&layers_timestamp=18641231,,,&E=2599760.55&N=1198964.58&zoom=10

Add the content element "Map geo admin / iframe" on a page and paste the url in the field "Map geo admin url". This
will then be parsed to create the embed url for the iframe.


## Which version for which TYPO3 and PHP?

| MapGeoAdmin | TYPO3    | PHP       | Support / Development                |
|-------------|----------|-----------|--------------------------------------|
| 4.x         | 13 LTS   | 8.3       | features, bugfixes, security updates |
| 3.x         | 11 LTS   | 8.1 - 8.3 | none                                 |
| 2.x         | 8, 9 LTS | 7.2 - 7.4 | none                                 |
| 1.x         | 8, 9 LTS | 7.0 - 7.1 | none                                 |


