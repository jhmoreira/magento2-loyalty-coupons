<?php
namespace Moreira\CountOrdersToGetDiscount\Model;
use Magento\Framework\App\Config\ScopeConfigInterface;

class ConfigProvider{
    const XML_PATH_ENABLE = 'orderdiscount/settings/enable';
    const XML_PATH_REQUIRED_ORDERS = 'orderdiscount/settings/order_count';
    const XML_PATH_DISCOUNT_PERCENT = 'orderdiscount/settings/discount_value';
    const XML_PATH_EXPIRATION_DAYS = 'orderdiscount/settings/coupon_expiration_days';
    const XML_PATH_COUPON_PREFIX = 'orderdiscount/settings/coupon_prefix';

    protected $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig){
        $this->scopeConfig = $scopeConfig;
    }
    public function isEnabled(){
        return $this->scopeConfig->getValue(self::XML_PATH_ENABLE);
    }
    public function getRequiredOrders(){
        return $this->scopeConfig->getValue(self::XML_PATH_REQUIRED_ORDERS);
    }
    public function getDiscountPercent(){
        return $this->scopeConfig->getValue(self::XML_PATH_DISCOUNT_PERCENT);
    }
    public function getExpirationDays(){
        return $this->scopeConfig->getValue(self::XML_PATH_EXPIRATION_DAYS);
    }
    public function getCouponPrefix(){
        return $this->scopeConfig->getValue(self::XML_PATH_COUPON_PREFIX);
    }

}
?>