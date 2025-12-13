<?php
namespace Moreira\CountOrdersToGetDiscount\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory as OrderCollectionFactory;
use Moreira\CountOrdersToGetDiscount\Model\CouponGenerator;
use Moreira\CountOrdersToGetDiscount\Model\ConfigProvider;
use Psr\Log\LoggerInterface;

class Checkorder implements ObserverInterface{

    protected $orderCollectionFactory;
    protected $couponGenerator;
    protected $configprovider;

    public function __construct(
        
        OrderCollectionFactory $orderCollectionFactory,
        CouponGenerator $couponGenerator,
        ConfigProvider $configprovider,
        LoggerInterface $logger

    ){
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->couponGenerator = $couponGenerator;
        $this->configProvider = $configprovider;
        $this->logger = $logger;
    }
    public function execute(Observer $observer){
        

        $order = $observer->getEvent()->getOrder();

        if($order->getStatus() != 'complete'){
            return;
        }

        $customerId = $order->getCustomerId();

        if(!$customerId){
            return;
        }
     
        $orderCount= $this->orderCollectionFactory->create()
        ->addFieldToFilter('customer_id', $customerId)
        ->addFieldToFilter('status', 'complete')
        ->count();
      
        $requireOrders = $this->configProvider->getRequiredOrders();
        $discountPercent = $this->configProvider->getDiscountPercent();

        if($orderCount > 0 && $orderCount % $requireOrders == 0){
            $couponCode = $this->couponGenerator->generate($discountPercent, $customerId);
            $order->addStatusHistoryComment(
                "Cupom liberado para o próximo pedido: {$couponCode}"
            );
        }
    }
}
?>