<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\ProductAvailable\Helper;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Customer\Model\Session;

/**
 * Helper
 */
class Data extends AbstractHelper
{
    /**
     * Hide add to cart config path
     */
    const XML_CONFIG_HIDE_ADD_TO_CART = 'catalog/available/hide_add_to_cart';

    /**
     * Hide from groups config path
     */
    const XML_CONFIG_HIDE_ADD_TO_CART_GROUPS = 'catalog/available/hide_add_to_cart_groups';

    /**
     * Hide price config path
     */
    const XML_CONFIG_HIDE_PRICE = 'catalog/available/hide_price';

    /**
     * Hide from groups config path
     */
    const XML_CONFIG_HIDE_PRICE_GROUPS = 'catalog/available/hide_price_groups';

    /**
     * Customer session
     *
     * @var \Magento\Customer\Model\Session
     */
    protected $_session;

    /**
     * Initialize helper
     *
     * @param Context $context
     * @param Session $session
     */
    public function __construct(
        Context $context,
        Session $session
    ) {
        $this->_session = $session;

        parent::__construct(
            $context
        );
    }

    /**
     * Check whether the customer allows add to cart
     *
     * @return bool
     */
    public function isAvailableAddToCart()
    {
        if ($this->_getConfig(self::XML_CONFIG_HIDE_ADD_TO_CART)) {
            return !in_array(
                $this->_session->getCustomerGroupId(),
                explode(',', $this->_getConfig(self::XML_CONFIG_HIDE_ADD_TO_CART_GROUPS))
            );
        }
        return true;
    }

    /**
     * Check whether the customer allows price
     *
     * @return bool
     */
    public function isAvailablePrice()
    {
        if ($this->_getConfig(self::XML_CONFIG_HIDE_PRICE)) {
            return !in_array(
                $this->_session->getCustomerGroupId(),
                explode(',', $this->_getConfig(self::XML_CONFIG_HIDE_PRICE_GROUPS))
            );
        }
        return true;
    }

    /**
     * Retrieve store configuration data
     *
     * @param   string $path
     * @return  string|null
     */
    protected function _getConfig($path)
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }
}
