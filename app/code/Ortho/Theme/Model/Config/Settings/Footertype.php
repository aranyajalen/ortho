<?php
namespace Ortho\Theme\Model\Config\Settings;

class Footertype implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [['value' => '1', 'label' => __('Footer Type1')], ['value' => '2', 'label' => __('Footer Type2')], ['value' => '3', 'label' => __('Footer Type3')], ['value' => '4', 'label' => __('Footer Type4')], ['value' => '5', 'label' => __('Footer Type5')]];
    }

    public function toArray()
    {
        return ['1' => __('Footer Type1'), '2' => __('Footer Type2'), '3' => __('Footer Type3'), '4' => __('Footer Type4'), '5' => __('Footer Type5')];
    }
}
