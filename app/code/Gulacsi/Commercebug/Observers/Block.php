<?php
/**
* Copyright © Pulse Storm LLC 2016
* All rights reserved
*/
namespace Gulacsi\Commercebug\Observers;
class Block extends AbstractObserver
{
    protected function _execute(\Magento\Framework\Event\Observer $observer)
    {
        return $this->getBlockInformation($observer);
    }

    public function getBlockInformation($observer)
    {
        \Gulacsi\Commercebug\Model\All::addTo('blocks', $observer->getBlock());
    }
}
