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
 * Product observer
 */
class ProductObserver implements ObserverInterface
{
    /**
     * Helper
     *
     * @var \Faonni\ProductAvailable\Helper\Data
     */
    protected $_helper;

    /**
     * Initialize observer
     *
     * @param Helper $helper
     */
    public function __construct(
        Helper $helper
    ) {
        $this->_helper = $helper;
    }

    /**
     * Handler for load product event
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        if (!$this->_helper->isAvailablePrice()) {
            $product = $observer->getEvent()->getProduct();
            $product->setCanShowPrice(false);
        }
    }
}
