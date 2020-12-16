<?php

namespace Mel\BannerSlider\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Mel\BannerSlider\Model\ResourceModel\Slider\Collection as SliderCollection;

class Slider extends SliderCollection implements OptionSourceInterface
{

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return $this->_toOptionArray('slider_id', 'name');
    }
}
