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
class CollectionObserver implements ObserverInterface
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
     * Handler for load product collection event
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        if (!$this->helper->isAvailablePrice()) {
            /** @var \Magento\Catalog\Model\ResourceModel\Product\Collection $collection */
            $collection = $observer->getEvent()->getData('collection');
            foreach ($collection->getItems() as $product) {
                /** @var \Magento\Catalog\Model\Product $product */
                $product->setData('can_show_price', false);
            }
        }
    }
}
