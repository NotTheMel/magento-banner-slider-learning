<?php

namespace Mel\BannerSlider\Model;

use Magento\Framework\Model\AbstractModel;
use Mel\BannerSlider\Model\ResourceModel\Slider as ResourceModel;

class Slider extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}