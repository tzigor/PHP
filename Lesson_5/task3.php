<?php

class Product {
    private string $title;
    private float $price;
    private array $components;
    function __construct(string $title, float $price = 0)
    {
        $this->price = $price;
        $this->title = $title;
    }
    public function addComponent(string $title, float $price): void
    {
        $product = new Product($title, $price);
        $product->title = $title;
        $product->price = $price;
        $this->components[] = $product;
        $this->price += $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}

class Cart {
    private array $products;

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function getTotalPrice(): float
    {
        $totalPrice = 0;
        foreach ($this->products as $item) {
            $totalPrice += $item->getPrice();
        }
        return $totalPrice;
    }

    public function removeProduct(int $index): void
    {
        array_splice($this->products, $index, 1);
    }
}

$product = new Product('product');
$product->addComponent('product 1', 100);
$product->addComponent('product 2', 300);

$product2 = new Product('product2', 350);
$product->addComponent('product 1', 100);

$cart = new Cart();
$cart->addProduct($product);
$cart->addProduct($product2);

echo $cart->getTotalPrice();
print_r($cart);