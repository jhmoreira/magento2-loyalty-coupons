<?php
namespace Moreira\CountOrdersToGetDiscount\Controller\Customer;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Customer\Model\Session as CustomerSession;

class Index extends Action{
   protected  $context;
   protected  $pageFactory;
   protected  $customerSession;

   public function __construct(
    Context $context,
    PageFactory $pageFactory,
    CustomerSession $customerSession
    ){
    $this->pageFactory = $pageFactory;
    $this->customerSession = $customerSession;
    parent::__construct($context);
   }
    public function execute(){

        if(!$this->customerSession->isLoggedin()){
            return $this->_redirect('customer/account/login');
        }
        return $this->pageFactory->create();

    }
}