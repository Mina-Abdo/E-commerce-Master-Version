<?php
namespace App\Entities\Contracts;

use App\Entities\OrderSellerEntity;
use App\Entities\ProductEntityInterface;

interface SellerOrderMailEntityInterface extends OrderMailEntityInterface
{
    /**
     * getWebsiteName
     *
     * @return string
     */
    public function getWebsiteName() :string;
    /**
     * setWebsiteName
     *
     * @param  mixed $name
     * @return void
     */
    public function setWebsiteName(string $name) :void;
    /**
     * getWebsiteEmail
     *
     * @return string
     */
    public function getWebsiteEmail() :string;
    /**
     * setWebsiteEmail
     *
     * @param  mixed $email
     * @return void
     */
    public function setWebsiteEmail(string $email) :void;
    /**
     * getWebsiteAddress
     *
     * @return string
     */
    public function getWebsiteAddress() :string;
    /**
     * setWebsiteAddress
     *
     * @param  mixed $address
     * @return void
     */
    public function setWebsiteAddress(string $address) :void;

    /**
     * getSellers
     *
     * @return string
     */
    public function getSeller() :OrderSellerEntity;

    /**
     * setSeller
     *
     * @param  self $seller
     * @return void
     */
    public function setSeller(OrderSellerEntity $seller) :void;

}
