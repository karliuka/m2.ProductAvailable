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
 * Lock salable
 */
class SalableObserver implements ObserverInterface
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
     * Handler for product salable event
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        if (!$this->helper->isAvailableAddToCart()) {
            /** @var \Magento\Framework\DataObject $salable */
            $salable = $observer->getEvent()->getData('salable');
            $salable->setData('is_salable', false);
        }
    }
}
