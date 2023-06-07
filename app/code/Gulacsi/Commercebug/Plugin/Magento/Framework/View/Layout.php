<?php
namespace Gulacsi\Commercebug\Plugin\Magento\Framework\View;
class Layout
{
    function beforeGenerateElements($subject){
        \Gulacsi\Commercebug\Model\All::addTo(
            'request_layout_xml', $subject->getNode()->asXml());
    }
}
