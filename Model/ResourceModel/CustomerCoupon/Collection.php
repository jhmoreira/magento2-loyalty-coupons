<?php

namespace Moreira\CountOrdersToGetDiscount\Model\ResourceModel\CustomerCoupon;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Moreira\CountOrdersToGetDiscount\Model\CustomerCoupon as Model;
use Moreira\CountOrdersToGetDiscount\Model\ResourceModel\CustomerCoupon as ResourceModel;

class Collection extends AbstractCollection{

    protected function _construct(){
        $this->_init(\Moreira\CountOrdersToGetDiscount\Model\CustomerCoupon::class, \Moreira\CountOrdersToGetDiscount\Model\ResourceModel\CustomerCoupon::class);
    }
}

