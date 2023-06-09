<?php

namespace Gulacsi\Uilibrary\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * A simple test controller for the hello world route
 *
 */
class Index extends Action
{
    protected $_pageFactory;

    /**
     * @param  Context  $context
     * @param  PageFactory  $pageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;

        return parent::__construct($context);
    }

    /**
     *
     */
    public function execute(): \Magento\Framework\View\Result\Page|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\App\ResponseInterface
    {
        return $this->_pageFactory->create();
    }

}

