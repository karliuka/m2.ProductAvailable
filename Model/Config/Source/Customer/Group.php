<?php
/**
 * Copyright © 2011-2017 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\ProductAvailable\Model\Config\Source\Customer;

use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\Option\ArrayInterface;

/**
 * Source of option values in a form of value-label pairs
 */
class Group implements ArrayInterface
{
    /**
     * Customer groups options array
     *
     * @var null|array
     */
    protected $_options;

    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;

    /**
     * @param ObjectManagerInterface $groupManagement
     */
    public function __construct(
        ObjectManagerInterface $objectManager
    ) {
        $this->_objectManager = $objectManager;
    }

    /**
     * Retrieve customer groups as array
     *
     * @return array
     */
    public function toOptionArray()
    {
        if (!$this->_options) {
            $groups = $this->_objectManager
				->get('\Magento\Customer\Model\ResourceModel\Group\Collection');
            $this->_options = $groups->toOptionArray();
        }
        return $this->_options;
    }
}
