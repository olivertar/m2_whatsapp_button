<?php
/**
 * Copyright © Orangecat. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Orangecat\WhatsAppButton\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Position implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'bottom-right', 'label' => __('Bottom Right')],
            ['value' => 'bottom-left', 'label' => __('Bottom Left')],
            ['value' => 'top-right', 'label' => __('Top Right')],
            ['value' => 'top-left', 'label' => __('Top Left')]
        ];
    }
}
