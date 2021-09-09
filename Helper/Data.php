<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
namespace Faonni\ProductAvailable\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
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
     * @var Session
     */
    private $session;

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
        $this->session = $session;

        parent::__construct(
            $context
        );
    }

    /**
     * Check whether the customer allows add to cart
     *
     * @param string $storeId
     * @return bool
     */
    public function isAvailableAddToCart($storeId = null)
    {
        if ($this->isSetFlag(self::XML_CONFIG_HIDE_ADD_TO_CART, $storeId)) {
            return $this->isAllowCustomerGroup(self::XML_CONFIG_HIDE_ADD_TO_CART_GROUPS, $storeId);
        }
        return true;
    }

    /**
     * Check whether the customer allows price
     *
     * @param string $storeId
     * @return bool
     */
    public function isAvailablePrice($storeId = null)
    {
        if ($this->isSetFlag(self::XML_CONFIG_HIDE_PRICE, $storeId)) {
            return $this->isAllowCustomerGroup(self::XML_CONFIG_HIDE_PRICE_GROUPS, $storeId);
        }
        return true;
    }

    /**
     * Check whether the customer croup allows
     *
     * @param   string $path
     * @param string $storeId
     * @return  bool
     */
    private function isAllowCustomerGroup($path, $storeId = null)
    {
        return !in_array(
            $this->session->getCustomerGroupId(),
            explode(',', $this->getValue($path, $storeId))
        );
    }

    /**
     * Retrieve config flag
     *
     * @param string $path
     * @param string $storeId
     * @return bool
     */
    private function isSetFlag($path, $storeId = null)
    {
        return $this->scopeConfig->isSetFlag($path, ScopeInterface::SCOPE_STORE, $storeId);
    }

    /**
     * Retrieve config value by path and scope
     *
     * @param string $path
     * @param string $storeId
     * @return string
     */
    private function getValue($path, $storeId = null)
    {
        return (string)$this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE, $storeId);
    }
}
