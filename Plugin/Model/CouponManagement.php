<?php

namespace IWD\Opc\Plugin\Model;

use IWD\Opc\Helper\Data;
use Magento\Customer\Model\Session;
use Magento\Quote\Model\CouponManagement as MagentoCouponManagement;

class CouponManagement
{
    /**
     * @var Data
     */
    public $helper;

    /**
     * @var
     */
    public $session;

    public function __construct(
        Data $helper,
        Session $session
    ) {
        $this->helper = $helper;
        $this->session = $session;
    }

    public function beforeSet(MagentoCouponManagement $subject, $cartId, $couponCode)
    {
        if ($this->helper->isEnable()) {
            if ($this->session->isLoggedIn()) {
                $couponCode = base64_decode($couponCode);
            }
        }

        return [$cartId,$couponCode];
    }
}
