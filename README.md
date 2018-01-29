# Magento2 Product Available

[![Total Downloads](https://poser.pugx.org/faonni/module-product-available/downloads)](https://packagist.org/packages/faonni/module-product-available)
[![Latest Stable Version](https://poser.pugx.org/faonni/module-product-available/v/stable)](https://packagist.org/packages/faonni/module-product-available)

Extension allows the store owner to hide the product price and add to cart button from guests or certain customer groups.
This is very necessary for B2B websites where the customer can see the price of the product and add it to the shopping cart after logging on to the site.

## Compatibility

Magento CE(EE) 2.0.x, 2.1.x, 2.2.x

## Install

#### Install via Composer (recommend)

1. Go to Magento2 root folder

2. Enter following commands to install module:

    ```bash
    composer require faonni/module-product-available
    ```
   Wait while dependencies are updated.
   
#### Manual Installation
   
1. Create a folder {Magento root}/app/code/Faonni/ProductAvailable

2. Download the corresponding [latest version](https://github.com/karliuka/m2.ProductAvailable/releases)

3. Copy the unzip content to the folder ({Magento root}/app/code/Faonni/ProductAvailable)

### Completion of installation

1. Go to Magento2 root folder

2. Enter following commands:

    ```bash
	php bin/magento setup:upgrade
	php bin/magento setup:di:compile
	php bin/magento setup:static-content:deploy  (optional)

### Configuration

In the Magento Admin Panel go to *Stores > Configuration > Catalog > Product Available*.

<img alt="Magento2 Product Available" src="https://karliuka.github.io/m2/product-available/configuration.png" style="width:100%"/>

### Catalog

<img alt="Magento2 Product Available" src="https://karliuka.github.io/m2/product-available/catalog.png" style="width:100%"/>

## Uninstall
This works only with modules defined as Composer packages.

#### Remove database data

1. Go to Magento2 root folder

2. Enter following commands to remove database data:

    ```bash
    php bin/magento module:uninstall -r Faonni_ProductAvailable
  
#### Remove Extension
    
1. Go to Magento2 root folder

2. Enter following commands to remove:

    ```bash
    composer remove faonni/module-product-available
    ```

### Completion of uninstall

1. Go to Magento2 root folder

2. Enter following commands:

    ```bash
	php bin/magento setup:upgrade
	php bin/magento setup:di:compile
	php bin/magento setup:static-content:deploy  (optional)