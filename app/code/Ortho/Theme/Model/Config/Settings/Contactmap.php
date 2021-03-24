<?php
namespace Ortho\Theme\Model\Config\Settings;

class Contactmap implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [['value' => '1', 'label' => __('Top')],['value' => '2', 'label' => __('Bottom')]];
    }

    public function toArray()
    {
        return ['1' => __('Top'), '2' => __('Bottom')];
    }
}
