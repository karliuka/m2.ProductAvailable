<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\ProductAvailable\Model\Config\Source\Customer;

use Magento\Framework\Option\ArrayInterface;
use Magento\Customer\Model\ResourceModel\Group\CollectionFactory;

/**
 * Customer groups source
 */
class Group implements ArrayInterface
{
    /**
     * Customer groups option
     *
     * @var mixed[]
     */
    private $options;

    /**
     * Customer group collection factory
     *
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * Initialize source
     *
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Retrieve customer groups as options
     *
     * @return mixed[]
     */
    public function toOptionArray()
    {
        if (null === $this->options) {
            $groups = $this->collectionFactory->create();
            $this->options = $groups->toOptionArray();
        }
        return $this->options;
    }
}
