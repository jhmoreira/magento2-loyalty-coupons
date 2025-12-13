<?php
namespace Moreira\CountOrdersToGetDiscount\Block;

use Magento\Framework\View\Element\Template;
use Moreira\CountOrdersToGetDiscount\Model\CustomerCouponRepository;
use Magento\Customer\Model\Session as CustomerSession;

class Coupons extends Template{
    protected $customerCoupons;
    protected  $customerSession;
    public function __construct(
        Template\Context $context,
        CustomerCouponRepository $customerCoupons,
        CustomerSession $customerSession,
        array $data = []
    ){
        $this->customerCoupons = $customerCoupons;
        $this->customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    public function isLoggedIn(){
        return $this->customerSession->isLoggedIn();
    }

    public function getCoupons(){
        return $this->customerCoupons->getActiveCoupons();
    }
}


?>