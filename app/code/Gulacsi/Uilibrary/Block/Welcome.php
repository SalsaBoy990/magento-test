<?php
namespace Gulacsi\Uilibrary\Block;

use Magento\Framework\View\Element\Template;

class Welcome extends Template
{
    /**
     * Retrieve welcome text
     *
     * @return string
     */
    public function getWelcomeText(): string
    {
        return 'Hello World';
    }

}
