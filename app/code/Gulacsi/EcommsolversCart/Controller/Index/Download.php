<?php

namespace Gulacsi\EcommsolversCart\Controller\Index;

use Gulacsi\EcommsolversCart\Model\CartItems;
use Gulacsi\EcommsolversCart\Model\GenerateCSV;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\View\Result\Page;

class Download extends Action
{
    /**
     * @var PageFactory
     */
    protected PageFactory $_pageFactory;

    /**
     * Gets current cart items of a customer
     *
     * @var CartItems
     */
    protected CartItems $cartItems;

    /**
     * Generates CSV on the fly from array
     * @var GenerateCSV
     */
    protected GenerateCSV $generateCSV;

    // Used to create pseudo-random strings
    private const CHARS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

    /**
     * @param  Context  $context
     * @param  PageFactory  $pageFactory
     * @param  CartItems  $cartItems
     * @param  GenerateCSV  $generateCSV
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        CartItems $cartItems,
        GenerateCSV $generateCSV,
    ) {
        $this->_pageFactory = $pageFactory;
        $this->cartItems = $cartItems;
        $this->generateCSV = $generateCSV;

        return parent::__construct($context);
    }

    /**
     * Get cart items and create a csv file on the fly
     *
     * @return Page|ResultInterface|ResponseInterface
     */
    public function execute(): Page|ResultInterface|ResponseInterface
    {
        $cartItems = $this->cartItems->getItems();
        $this->generateCSV->outputCSV($cartItems, $this->generateFilename());
        exit;
    }

    /**
     * Generates a filename for the CSV file
     *
     * @return string
     */
    private function generateFilename(): string
    {
        return 'cart-' . substr(str_shuffle(self::CHARS), 0, 10) . '.csv';
    }
}
