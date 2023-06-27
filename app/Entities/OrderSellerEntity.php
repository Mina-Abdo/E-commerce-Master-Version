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
    private float $total;
    private float $subTotal;
    private float $discount;
    private float $shipping;

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

    /**
         * getTotal
         *
         * @return float
         */
        public function getTotal(): float
        {
            return $this->total;
        }
        /**
             * setTotal
             *
             * @param  mixed $total
             * @return void
             */
        public function setTotal(float $total): void
        {
            $this->total = $total;
        }
        /**
             * getSubTotal
             *
             * @return float
             */
        public function getSubTotal(): float
        {
            return $this->subTotal;
        }
        /**
             * setSubTotal
             *
             * @param  mixed $subTotal
             * @return void
             */
        public function setSubTotal(float $subTotal): void
        {
            $this->subTotal = $subTotal;
        }
        /**
             * getDiscount
             *
             * @return float
             */
        public function getDiscount(): float
        {
            return $this->discount;
        }
        /**
             * setDiscount
             *
             * @param  mixed $discount
             * @return void
             */
        public function setDiscount(float $discount): void
        {
            $this->discount = $discount;
        }
        /**
             * getShipping
             *
             * @return float
             */
        public function getShipping(): float
        {
            return $this->shipping;

        }
        /**
             * setShipping
             *
             * @param  mixed $shipping
             * @return void
             */
        public function setShipping(float $shipping): void
        {
            $this->shipping = $shipping;

        }
}
