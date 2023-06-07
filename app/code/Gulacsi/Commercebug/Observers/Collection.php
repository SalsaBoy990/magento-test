<?php
/**
* Copyright © Pulse Storm LLC 2016
* All rights reserved
*/
namespace Gulacsi\Commercebug\Observers;
class Collection extends AbstractObserver
{
    protected function _execute(\Magento\Framework\Event\Observer $observer)
    {
        return $this->getCollectionInformation($observer);
    }

    public function getCollectionInformation($observer)
    {
        \Gulacsi\Commercebug\Model\All::addTo('collections',
            $observer->getCollection());
    }
}
