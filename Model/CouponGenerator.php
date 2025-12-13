<?php
namespace Moreira\CountOrdersToGetDiscount\Model;
use Magento\SalesRule\Model\RuleFactory;
use Magento\SalesRule\Model\Coupon;
use Magento\SalesRule\Model\CouponFactory;
use Magento\Framework\Stdlib\Datetime\TimezoneInterface;
use Magento\Framework\Math\Random;
use Magento\Store\Model\StoreManagerInterface;
use Moreira\CountOrdersToGetDiscount\Model\ConfigProvider;
use Moreira\CountOrdersToGetDiscount\Model\CustomerCouponFactory;
use Psr\Log\LoggerInterface;

class CouponGenerator{

    protected $ruleFactory;
    protected $couponFactory;
    protected $date;
    protected $random;
    protected $storeManager;
    protected $configprovider;
    protected $logger;
    protected $customerCouponFactory;

    public function __construct(
        RuleFactory $ruleFactory,
        CouponFactory $couponFactory,
        TimezoneInterface $date,
        ConfigProvider $configprovider,
        Random $random,
        StoreManagerInterface $storeManager,
        LoggerInterface $logger,
        CustomerCouponFactory $customerCouponFactory
    ){
        $this->ruleFactory = $ruleFactory;
        $this->couponFactory = $couponFactory;
        $this->date = $date;
        $this->random = $random;
        $this->storeManager = $storeManager;
        $this->configProvider = $configprovider;
        $this->logger = $logger;
        $this->customerCouponFactory = $customerCouponFactory;
       
    }

    public function generate($discountPercent, $customerId){
        

        $webSiteId = [];
        foreach($this->storeManager->getWebsites() as $website){
            $webSiteId[] = $website->getId();
        }
        $currentDate = $this->date->date();
        $expirationDays = $this->configProvider->getExpirationDays();
        $date = $currentDate;
        $date->modify("+{$expirationDays} days");
        $toDate = $date->format('Y-m-d');

    
        $couponCode = $this->configProvider->getCouponPrefix().strtoupper($this->random->getRandomString(6));
        $rule = $this->ruleFactory->create();
        $rule->setName("Desconto Fidelidade $customerId")
        ->setIsActive(1)
        ->setWebsiteIds($webSiteId)
        ->setCustomerGroupIds([0,1,2,3])
        ->setStopRulesProcessing(0)
        ->setSimpleAction("by_percent")
        ->setDiscountAmount($discountPercent)
        ->setFromDate($this->date->date()->format('Y-m-d H:i:s'))
        ->setToDate($toDate)
        ->setUsesPerCoupon(1)
        ->setUsesPerCustomer(1)
        ->setCouponType(\Magento\SalesRule\Model\Rule:: COUPON_TYPE_SPECIFIC)
        ->save();

        $coupon = $this->couponFactory->create();
        $coupon->setRuleId($rule->getId())
        ->setCode($couponCode)
        ->setIsPrimary(1)
        ->save();

        $customerCoupon = $this->customerCouponFactory->create();
        $customerCoupon->setCustomerId($customerId)
        ->setCouponCode($couponCode)
        ->setDiscount($discountPercent)
        ->setExpiration($toDate)
        ->setStatus(0)
        ->save();

        return $couponCode;
    }
}
?>