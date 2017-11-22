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
 * Salable observer
 */
class SalableObserver implements ObserverInterface
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
     * Handler for product salable event
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
		if (!$this->_helper->isAvailableAddToCart()) {
			$salable = $observer->getEvent()->getSalable();		
			$salable->setIsSalable(false);			
		}
		return $this;
    }
} 