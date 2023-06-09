<?php

namespace Gulacsi\Uilibrary\Controller\Index;

use Magento\Framework\App\Action\Action;

/**
 * A simple test controller for the hello world route
 *
 */
class Test extends Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;

        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        echo "Hello World";
        exit;
    }

    public function index() {
        return $this->_pageFactory->create();
    }
}
