<?php
namespace App\Entities;

use App\Entities\Contracts\OrderSellerInterface;

class OrderSellerEntity implements OrderSellerInterface
{
    private array $products =[];
    private string $sellerName;
    private string $sellerShopName;
    private string $sellerEmail;
    private string $sellerPhone;




    /**
     * addSeller
     *
     * @param  mixed $seller
     * @return void
     */
    public function addProduct(ProductEntity $product):void
    {
        $this->products[] = $product;
    }

    /**
     * getSellers
     *
     * @return array
     */
    public function getProducts() :array
    {
        return $this->products;
    }



    /**
     * Get the value of sellerName
     */
    public function getSellerName():string
    {
        return $this->sellerName;
    }

    /**
     * Set the value of sellerName
     *
     * @return  self
     */
    public function setSellerName(string $sellerName) :void
    {
        $this->sellerName = $sellerName;

    }

    /**
     * Get the value of sellerShopName
     */
    public function getSellerShopName() :string
    {
        return $this->sellerShopName;
    }

    /**
     * Set the value of sellerShopName
     *
     * @return  self
     */
    public function setSellerShopName(string $sellerShopName) :void
    {
        $this->sellerShopName = $sellerShopName;
    }

    /**
     * Get the value of sellerEmail
     */
    public function getSellerEmail() :string
    {
        return $this->sellerEmail;
    }

    /**
     * Set the value of sellerEmail
     *
     * @return  self
     */
    public function setSellerEmail(string $sellerEmail) :void
    {
        $this->sellerEmail = $sellerEmail;
    }

    /**
     * Get the value of sellerPhone
     */
    public function getSellerPhone() :string
    {
        return $this->sellerPhone;
    }

    /**
     * Set the value of sellerPhone
     *
     * @return  self
     */
    public function setSellerPhone(string $sellerPhone) :void
    {
        $this->sellerPhone = $sellerPhone;
    }
}
