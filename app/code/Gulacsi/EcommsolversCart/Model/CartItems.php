<?php

namespace Gulacsi\EcommsolversCart\Model;

use Magento\Checkout\Model\Cart;
use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;

class CartItems extends Template
{

    /**
     * @var Cart
     */
    protected Cart $cart;

    /**
     * @param Context $context
     * @param Cart $cart
     * @param array $data
     */
    public function __construct(Context $context, Cart $cart, array $data = [])
    {
        $this->cart = $cart;
        parent::__construct($context, $data);
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        // get quote items array
        $items = $this->cart->getQuote()->getAllItems();

        $results = [
            ['ID', 'Name', 'Sku', 'Quantity', 'Price'],
        ];

        foreach ($items as $item) {
            if ($item->getQty() > 0) {
                $results[] = [
                    $item->getProductId(),
                    $item->getName(),
                    $item->getSku(),
                    $item->getQty(),
                    $item->getPrice()
                ];
            }
        }

        return $results;
    }
}
