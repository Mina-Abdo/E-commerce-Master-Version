<?php

namespace App\Services;

use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Address;
use App\Models\WebsiteSetting;
use App\Entities\ProductEntity;
use App\Entities\OrderSellerEntity;
use App\Entities\UserOrderMailEntity;
use App\Entities\AdminOrderMailEntity;
use App\Entities\SellerOrderMailEntity;
use App\Entities\ProductEntityInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Entities\Contracts\UserOrderMailEntityInterface;
use App\Entities\Contracts\AdminOrderMailEntityInterface;
use App\Entities\Contracts\SellerOrderMailEntityInterface;

class PreprareOrderMailDataService
{
    private UserOrderMailEntityInterface $userEntity;
    private AdminOrderMailEntityInterface $adminEntity;
    private SellerOrderMailEntityInterface $sellerEntity;
    private ProductEntityInterface $productEntity;

    public function __construct(
        private User $user,
        private Admin $admin,
        private Order $order,
        private Collection $cart,
        private Address $address,
        private WebsiteSetting $webisteSetting,
        private ?string $coupon,
        private float $shipping,
        private float $discount,
        private float $subTotal // total berfore adding the shipping value or subsctacting the discount value
    ) {
        $this->userEntity = new UserOrderMailEntity;
        $this->adminEntity = new AdminOrderMailEntity;
        $this->sellerEntity = new SellerOrderMailEntity;
        $this->productEntity = new ProductEntity;
        $this->prepareDate();
    }

    /**
     * prepareDate
     *
     * @return void
     */
    private function prepareDate()
    {
        # common

        // private string $userName;
        $this->userEntity->setUserName($this->user->name);
        $this->sellerEntity->setUserName($this->user->name);
        $this->adminEntity->setUserName($this->user->name);
        // private string $userEmail;
        $this->userEntity->setUserEmail($this->user->email);
        $this->sellerEntity->setUserEmail($this->user->email);
        $this->adminEntity->setUserEmail($this->user->email);
        // private string $userAddress;
        $this->userEntity->setUserAddress($this->address->getFullAddress());
        $this->sellerEntity->setUserAddress($this->address->getFullAddress());
        $this->adminEntity->setUserAddress($this->address->getFullAddress());
        // private string $coupon;
        $this->userEntity->setCoupon($this->coupon);
        $this->sellerEntity->setCoupon($this->coupon);
        $this->adminEntity->setCoupon($this->coupon);
        // private string $orderCode;
        $this->userEntity->setOrderCode($this->order->code);
        $this->sellerEntity->setOrderCode($this->order->code);
        $this->adminEntity->setOrderCode($this->order->code);
        // private string $orderCreationDate;
        $this->userEntity->setOrderCreationDate($this->order->created_at);
        $this->sellerEntity->setOrderCreationDate($this->order->created_at);
        $this->adminEntity->setOrderCreationDate($this->order->created_at);
        // private string $orderDeliveryDate;
        $this->userEntity->setOrderDeliveryDate($this->order->delivery_date);
        $this->sellerEntity->setOrderDeliveryDate($this->order->delivery_date);
        $this->adminEntity->setOrderDeliveryDate($this->order->delivery_date);
        // private float $subTotal;
        $this->userEntity->setSubTotal($this->subTotal);
        $this->sellerEntity->setSubTotal($this->subTotal);
        $this->adminEntity->setSubTotal($this->subTotal);
        // private float $discount;
        $this->userEntity->setDiscount($this->discount);
        $this->sellerEntity->setDiscount($this->discount);
        $this->adminEntity->setDiscount($this->discount);
        // private float $shipping;
        $this->userEntity->setShipping($this->shipping);
        $this->sellerEntity->setShipping($this->shipping);
        $this->adminEntity->setShipping($this->shipping);
        // private float $total;
        $total = $this->subTotal + $this->shipping - (($this->discount / 100) * $this->subTotal);
        $this->userEntity->setTotal($total);
        $this->sellerEntity->setTotal($total);
        $this->adminEntity->setTotal($total);


        foreach ($this->cart as $cartProduct) {
            $adminEntity = clone $this->adminEntity;
            $productEntity = clone $this->productEntity;
            $sellerEntity = clone $this->sellerEntity;

            $productEntity->setName($cartProduct->name);
            $productEntity->setPrice($cartProduct->sale_price);
            $productEntity->setQuantity($cartProduct->carts->quantity);
            $productEntity->setStock($cartProduct->quantity - $cartProduct->carts->quantity);
            $productEntity->setCode($cartProduct->code);
            $productEntity->setSellerName($cartProduct->seller->name);
            $productEntity->setSellerEmail($cartProduct->seller->email);



            // private array $products;
            $adminEntity->addProduct($productEntity);
            $this->userEntity->addProduct($productEntity);
            $sellerEntity->addProduct($productEntity);


            // admin
            // private string $sellerName;
            $adminEntity->setSellerName($cartProduct->seller->name);
            $sellerEntity->setSellerName($cartProduct->seller->name);
            // private string $sellerShopName;
            $adminEntity->setSellerShopName($cartProduct->seller->shop_name);
            $sellerEntity->setSellerShopName($cartProduct->seller->shop_name);

            // private string $sellerEmail;
            $adminEntity->setSellerEmail($cartProduct->seller->email);
            $sellerEntity->setSellerEmail($cartProduct->seller->email);

            // private string $sellerPhone;
            $adminEntity->setSellerPhone($cartProduct->seller->phone);
            $sellerEntity->setSellerPhone($cartProduct->seller->phone);

            // unique admin mail sellers

            if (!$this->adminEntity->getSellers()) { // check that adminEntity has no sellers
                $sellerEntityForAdminMail = $this->prepareSeller($cartProduct->seller->name,
                $cartProduct->seller->shop_name,
                $cartProduct->seller->email,
                $cartProduct->seller->phone,
                $productEntity); // new seller entity for admin mail to fill its data
                $this->adminEntity->addSeller($sellerEntityForAdminMail);
            } else {
                foreach ($adminEntity->getSellers() as $adminSeller) {
                    if ($cartProduct->seller->email != $adminSeller->getSellerEmail()) { // check if the seller already exsists
                        $sellerEntityForAdminMail = $this->prepareSeller($cartProduct->seller->name,
                        $cartProduct->seller->shop_name,
                        $cartProduct->seller->email,
                        $cartProduct->seller->phone,
                        $productEntity); // new seller entity for admin mail to fill its data
                        $this->adminEntity->addSeller($sellerEntityForAdminMail);
                    } else {
                        $adminSeller->addProduct($productEntity); // new seller entity for admin mail to fill its data
                    }
                }
            }
            $this->sellerEntity = $sellerEntity; // assign the modified clone to the original seller entity to include added data
        }
        // private string $adminEmail;
        $this->adminEntity->setAdminEmail($this->admin->email);
        # user/seller
        // private string $webisteName;
        $this->userEntity->setWebsiteName($this->webisteSetting->name);
        $this->sellerEntity->setWebsiteName($this->webisteSetting->name);
        // private string $webisteAddress;
        $this->userEntity->setWebsiteAddress($this->webisteSetting->address);
        $this->sellerEntity->setWebsiteAddress($this->webisteSetting->address);
        // private string $webisteEmail;
        $this->userEntity->setWebsiteEmail($this->webisteSetting->email);
        $this->sellerEntity->setWebsiteEmail($this->webisteSetting->email);
    }

    private function prepareSeller($sellerName, $shopName, $sellerEmail, $sellerPhone, $sellerProduct)
    {
        $sellerEntityForAdminMail = new OrderSellerEntity(); // new seller entity for admin mail to fill its data
        $sellerEntityForAdminMail->setSellerName($sellerName);
        $sellerEntityForAdminMail->setSellerShopName($shopName);
        $sellerEntityForAdminMail->setSellerEmail($sellerEmail);
        $sellerEntityForAdminMail->setSellerPhone($sellerPhone);
        $sellerEntityForAdminMail->addProduct($sellerProduct);
        return $sellerEntityForAdminMail;
    }

    /**
     * Get the value of userEntity
     */
    public function getUserEntity()
    {
        return $this->userEntity;
    }

    /**
     * Get the value of adminEntity
     */
    public function getAdminEntity()
    {
        return $this->adminEntity;
    }

    /**
     * Get the value of sellerEntity
     */
    public function getSellerEntity()
    {
        return $this->sellerEntity;
    }
}
