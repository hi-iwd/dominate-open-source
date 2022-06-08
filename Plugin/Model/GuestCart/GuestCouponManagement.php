<?php

namespace IWD\Opc\Plugin\Model\GuestCart;

use IWD\Opc\Helper\Data;
use Magento\Quote\Model\GuestCart\GuestCouponManagement as MagentoGuestCouponManagement;

class GuestCouponManagement
{
    public $helper;

    public function __construct(
        Data $helper
    ) {
        $this->helper = $helper;
    }

    public function beforeSet(MagentoGuestCouponManagement $subject, $cartId, $couponCode)
    {
        if ($this->helper->isEnable()) {
            $couponCode = base64_decode($couponCode);
        }

        return [$cartId,$couponCode];
    }
}
