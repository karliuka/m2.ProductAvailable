# Magento2 Product Available
Extension allows the store owner to hide the product price and add to cart button from guests or certain customer groups.

### Configuration
<img alt="Magento2 Product Available" src="https://karliuka.github.io/m2/product-available/config.png" style="width:100%"/>
### Catalog
<img alt="Magento2 Product Available" src="https://karliuka.github.io/m2/product-available/catalog.png" style="width:100%"/>
## Install with Composer as you go

1. Go to Magento2 root folder

2. Enter following commands to install module:

    ```bash
    composer require faonni/module-product-available
    ```
   Wait while dependencies are updated.

3. Enter following commands to enable module:

    ```bash
	php bin/magento setup:upgrade
	php bin/magento setup:static-content:deploy

