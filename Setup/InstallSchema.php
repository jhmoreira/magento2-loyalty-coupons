<?php
namespace Moreira\CountOrdersToGetDiscount\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context){
        $setup->startSetup();
        if(!$setup->tableExists('moreira_customer_coupon')){
            $table = $setup->getConnection()
            ->newTable($setup->getTable('moreira_customer_coupon'))
            ->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                ['identity'=>true, 'nullable'=>false, 'primary'=>true],
                'ID'
            )
            ->addColumn(
                'customer_id',
                Table::TYPE_INTEGER,
                null,
                [ 'nullable'=>false],
                'Customer ID'
            )
            ->addColumn(
                'coupon_code',
                Table::TYPE_TEXT,
                50,
                [ 'nullable'=>false],
                'Coupon Code'
            )
            ->addColumn(
                'discount',
                Table::TYPE_DECIMAL,
                null,
                [ 'nullable'=>false],
                'Discount'
            )
            ->addColumn(
                'expiration',
                Table::TYPE_DATETIME,
                null,
                ['nullable'=>true],
                'Expiration Date'
            )
            ->addColumn(
                'status',
                Table::TYPE_SMALLINT,
                null,
                ['nullable'=>false, 'default'=>0],
                'Status'
            )
            ->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable'=>false, 'default'=>Table::TIMESTAMP_INIT],
                'Created At'
            )
            ->setComment('Customer Coupons Table');
            $setup->getConnection()->createTable($table);
        }
        $setup->endSetup();
    }
}
?>