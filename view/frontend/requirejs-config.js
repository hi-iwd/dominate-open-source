var config = {
    config: {
        mixins: {
            'Magento_ReCaptchaFrontendUi/js/reCaptcha': {
                'IWD_Opc/js/reCaptcha-mixin': true
            },
            'PayPal_Braintree/js/view/payment/adapter': {
                'IWD_Opc/js/view/payment/methods-renderers/braintree/adapter': true
            },
        },
    }
};