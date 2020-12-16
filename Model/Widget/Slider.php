<?php

namespace Mel\BannerSlider\Model\Widget;

class Slider extends \Mel\BannerSlider\Model\ResourceModel\Slider\Collection implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return $this->_toOptionArray('slider_id', 'name');
    }
}
