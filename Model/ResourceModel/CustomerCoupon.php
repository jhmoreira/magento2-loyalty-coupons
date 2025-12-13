<?php

namespace Moreira\CountOrdersToGetDiscount\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CustomerCoupon extends AbstractDb{

    protected function _construct(){
        $this->_init('moreira_customer_coupon','id');
    }
}

