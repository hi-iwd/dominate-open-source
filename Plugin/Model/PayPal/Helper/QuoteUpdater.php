<?php

namespace IWD\Opc\Plugin\Model\PayPal\Helper;

use PayPal\Braintree\Model\Paypal\Helper\QuoteUpdater as BraintreeQuoteUpdater;
use Magento\Quote\Model\Quote;

class QuoteUpdater
{
    /* Magento 2 before plugin example */
    public function beforeExecute(BraintreeQuoteUpdater $subject, $nonce, array $details, Quote $quote)
    {
        if (isset($details['firstName']) && isset($details['lastName'])) {
            if (isset($details['shippingAddress']) && (!isset($details['shippingAddress']['recipientFirstName']) || !isset($details['shippingAddress']['recipientLastName']))) {
                $details['shippingAddress']['recipientFirstName'] = $details['firstName'];
                $details['shippingAddress']['recipientLastName'] = $details['lastName'];
            }
        }
        return [$nonce, $details, $quote];
    }

}
