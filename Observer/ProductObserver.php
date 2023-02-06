<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\ProductAvailable\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Faonni\ProductAvailable\Helper\Data as Helper;

/**
 * Lock show price
 */
class ProductObserver implements ObserverInterface
{
    /**
     * Helper
     *
     * @var Helper
     */
    private $helper;

    /**
     * Initialize observer
     *
     * @param Helper $helper
     */
    public function __construct(
        Helper $helper
    ) {
        $this->helper = $helper;
    }

    /**
     * Handler for load product event
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        if (!$this->helper->isAvailablePrice()) {
            /** @var \Magento\Catalog\Model\Product $product */
            $product = $observer->getEvent()->getData('product');
            $product->setData('can_show_price', false);
        }
    }
}
