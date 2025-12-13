<?php

namespace Moreira\CountOrdersToGetDiscount\Model;
use Magento\Customer\Model\Session;
use Moreira\CountOrdersToGetDiscount\Model\ResourceModel\CustomerCoupon\CollectionFactory as CouponCollectionFactory;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Psr\Log\LoggerInterface;

class CustomerCouponRepository{
    protected $couponCollectionFactory;
    protected $customerSession;
    protected $date;
    protected $logger;

    public function __construct(
        CouponCollectionFactory $couponCollectionFactory,
        Session $customerSession,
        LoggerInterface $logger,
        TimezoneInterface $date
    ){
        $this->couponCollectionFactory = $couponCollectionFactory;
        $this->customerSession = $customerSession;
        $this->date = $date;
        $this->logger = $logger;
    }

    public function getActiveCoupons(){
        $customerId = $this->customerSession->getCustomerId();
        if(!$customerId){
            return [];
        }
       
        $today = $this->date->date()->format('Y-m-d H:i:s');

        $collection = $this->couponCollectionFactory->create();
        $collection->addFieldToFilter('customer_id',$customerId);
        $collection->addFieldToFilter('status',0);
        $collection->setOrder('created_at','DESC');
        $collection->addFieldToSelect(['coupon_code', 'expiration', 'status', 'id']);
        
       
       
        return $collection;
    }
}

