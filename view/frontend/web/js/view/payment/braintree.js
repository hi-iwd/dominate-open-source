/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
/*browser:true*/
/*global define*/
define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';

        let config = window.checkoutConfig.payment,
            braintreeType = 'braintree',
            payPalType = 'braintree_paypal',
            braintreeAchDirectDebit = 'braintree_ach_direct_debit';

        if (config[braintreeType].isActive) {
            rendererList.push(
                {
                    type: braintreeType,
                    component: 'PayPal_Braintree/js/view/payment/method-renderer/hosted-fields'
                }
            );
        }

        if (config[payPalType].isActive) {
            rendererList.push(
                {
                    type: payPalType,
                    component: 'IWD_Opc/js/view/payment/methods-renderers/paypal'
                }
            );
        }

        rendererList.push(
            {
                type: 'braintree_venmo',
                component: 'PayPal_Braintree/js/view/payment/method-renderer/venmo'
            }
        );

        rendererList.push(
            {
                type: braintreeAchDirectDebit,
                component: 'PayPal_Braintree/js/view/payment/method-renderer/ach'
            }
        );

        rendererList.push(
            {
                type: 'braintree_local_payment',
                component: 'PayPal_Braintree/js/view/payment/method-renderer/lpm'
            }
        );

        /** Add view logic here if needed */
        return Component.extend({});
    }
);