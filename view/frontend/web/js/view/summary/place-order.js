define(
    [
        'jquery',
        'ko',
        'Magento_Checkout/js/view/summary',
        'Magento_Checkout/js/model/step-navigator',
    ],
    function(
        $,
        ko,
        Component,
        stepNavigator
    ) {
        'use strict';

        return Component.extend({
            checkoutData: window.checkoutData,

            placeOrder: function () {
                let self = this,
                    shipping = self.checkoutData.shipping;

                if (!shipping.isAddressHasError()) {
                    $(".payment-method._active").find('.action.primary.checkout').trigger( 'click' );
                }
            },

            initialize: function () {
                let self = this;

                $(function() {
                    $('body').on("click", '#place-order-trigger', function () {
                        self.placeOrder();
                    });
                });

                self.checkoutData.secondaryPlaceOrder = this;

                this._super().observe({
                    isVisible: false,
                });
            }

        });
    }
);
