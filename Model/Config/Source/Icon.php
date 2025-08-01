<?php

namespace Orangecat\WhatsAppButton\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Icon implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 1, 'label' => __('Icon 1')],
            ['value' => 2, 'label' => __('Icon 2')],
            ['value' => 'custom', 'label' => __('Custom Icon')]
        ];
    }
}
