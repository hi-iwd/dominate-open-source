<?php

namespace IWD\Opc\Block\Adminhtml\System\Config\Style;

use Magento\Config\Block\System\Config\Form\Field;

class ColorPicker extends Field
{
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $html = $element->getElementHtml();
        $value = $element->getData('value');
        $html .= '<script type="text/javascript">
            require(["jquery","jquery/colorpicker/js/colorpicker"], function ($) {
                $(document).ready(function (e) {
                    $("#' . $element->getHtmlId() . '").css("background-color","#' . $value . '");
                    $("#' . $element->getHtmlId() . '").ColorPicker({
                        color: "#' . $value . '",
                        onSubmit:function(hsb,hex,rgb,el) {
                            $(el).css("background-color","#"+hex);
                            $(el).val(hex);
                            $(el).ColorPickerHide();

                        }
                    });
                });
            });
            </script>';
        return $html;
    }
}
