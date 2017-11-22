<?php
/**
 * Copyright © 2011-2017 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\ProductAvailable\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Faonni\ProductAvailable\Helper\Data as ProductAvailableHelper;

/**
 * Product observer
 */
class ProductObserver implements ObserverInterface
{
    /**
     * Helper instance
     *
     * @var \Faonni\ProductAvailable\Helper\Data
     */
    protected $_helper; 
	
    /**
     * @param \Faonni\ProductAvailable\Helper\Data $helper
     *
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
		ProductAvailableHelper $helper
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
		return $this;
    }
} 