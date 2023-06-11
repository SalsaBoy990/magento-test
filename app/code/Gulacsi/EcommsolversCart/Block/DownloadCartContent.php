<?php
namespace Gulacsi\EcommsolversCart\Block;

use Magento\Framework\View\Element\Template;

class DownloadCartContent extends Template
{
    /**
     * Is downloading cart items in CSV enabled
     *
     * @return integer
     */
    public function getIsDownloadEnabled(): int
    {
        return $this->_scopeConfig->getValue('section_id/ecommsolvers_settings_group_cart/field_id');
    }
}
