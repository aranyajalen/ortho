<?php
namespace Ortho\Theme\Model\Config\Settings;

class Headertype implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [['value' => '1', 'label' => __('Header Type1')], ['value' => '2', 'label' => __('Header Type2')], ['value' => '3', 'label' => __('Header Type3')], ['value' => '4', 'label' => __('Header Type4')], ['value' => '5', 'label' => __('Header Type5')]];
    }

    public function toArray()
    {
        return ['1' => __('Header Type1'), '2' => __('Header Type2'), '3' => __('Header Type3'), '4' => __('Header Type4'), '5' => __('Header Type5')];
    }
}
