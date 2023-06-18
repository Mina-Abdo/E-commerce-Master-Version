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
}
