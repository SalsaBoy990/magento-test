<?php
/**
* Copyright © Pulse Storm LLC 2016
* All rights reserved
*/
namespace Gulacsi\Commercebug\Model\ResourceModel\Log;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Gulacsi\Commercebug\Model\Log','Gulacsi\Commercebug\Model\ResourceModel\Log');
    }
}
