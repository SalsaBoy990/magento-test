<?php
/**
* Copyright © Pulse Storm LLC 2016
* All rights reserved
*/
namespace Gulacsi\Commercebug\Plugins;
class Events
{
    public function beforeDispatch($subject, $eventName, array $data = [])
    {
        \Gulacsi\Commercebug\Model\All::addTo('dispatched_events', $eventName);
        $args = func_get_args();
        array_shift($args);
        return $args;
        return null; // don't replace any arguments
    }

}
