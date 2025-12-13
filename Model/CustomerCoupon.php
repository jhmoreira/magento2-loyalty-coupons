<?php

namespace Moreira\CountOrdersToGetDiscount\Model;

use Magento\Framework\Model\AbstractModel;

class CustomerCoupon extends AbstractModel{

    protected function _construct(){
        $this->_init(\Moreira\CountOrdersToGetDiscount\Model\ResourceModel\CustomerCoupon::class);
    }
}

