<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\ProductAvailable\Model\Config\Source\Customer;

use Magento\Framework\Option\ArrayInterface;
use Magento\Customer\Model\ResourceModel\Group\CollectionFactory;

/**
 * Customer Groups Source Option
 */
class Group implements ArrayInterface
{
    /**
     * Customer Groups Options array
     *
     * @var null|array
     */
    protected $_options;

    /**
     * Customer Group Collection Factory
     *
     * @var \Magento\Customer\Model\ResourceModel\Group\CollectionFactory
     */
    protected $_collectionFactory;

    /**
	 * Initialize Source
	 *	
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
    }

    /**
     * Retrieve Customer Groups As Options
     *
     * @return array
     */
    public function toOptionArray()
    {
        if (null === $this->_options) {
            $groups = $this->_collectionFactory->create();
            $this->_options = $groups->toOptionArray();
        }
        return $this->_options;
    }
}
