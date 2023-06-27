<?php
namespace App\Entities\Contracts;

use App\Entities\ProductEntity;

interface OrderSellerInterface
{
    /**
     * addSellerName
     *
     * @param  string $name
     * @return void
     */
    public function setSellerName(string $name):void;

    /**
     * getSellerName
     *
     * @return array
     */
    public function getSellerName() :string;

    /**
     * setSellerShopName
     *
     * @param  string $shopName
     * @return void
     */
    public function setSellerShopName(string $shopName) :void;

    /**
     * getSellerShopName
     *
     * @return string
     */
    public function getSellerShopName() :string;

    /**
     * setSellerEmail
     *
     * @param  string $email
     * @return void
     */
    public function setSellerEmail(string $email) :void;

    /**
     * getSellerEmail
     *
     * @return string
     */
    public function getSellerEmail() :string;

    /**
     * setSellerPhone
     *
     * @param  string $phone
     * @return void
     */
    public function setSellerPhone(string $phone) :void;

    /**
     * getSellerPhone
     *
     * @return string
     */
    public function getSellerPhone() :string;

    /**
     * addProducts
     *
     * @param  ProductEntity $producst
     * @return void
     */
    public function addProduct(ProductEntity $producst) :void;

    /**
     * getProducts
     *
     * @return array
     */
    public function getProducts() :array;

    /**
     * getTotal
     *
     * @return float
     */
    public function getTotal() :float;
    /**
     * setTotal
     *
     * @param  mixed $total
     * @return void
     */
    public function setTotal(float $total) :void;
    /**
     * getSubTotal
     *
     * @return float
     */
    public function getSubTotal() :float;
    /**
     * setSubTotal
     *
     * @param  mixed $subTotal
     * @return void
     */
    public function setSubTotal(float $subTotal) :void;
    /**
     * getDiscount
     *
     * @return float
     */
    public function getDiscount() :float;
    /**
     * setDiscount
     *
     * @param  mixed $discount
     * @return void
     */
    public function setDiscount(float $discount) :void;
    /**
     * getShipping
     *
     * @return float
     */
    public function getShipping() :float;
    /**
     * setShipping
     *
     * @param  mixed $shipping
     * @return void
     */
    public function setShipping(float $shipping) :void;
}
