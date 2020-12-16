<?php

namespace Mel\BannerSlider\Model;

use Magento\Framework\Model\AbstractModel;
use Mel\BannerSlider\Model\ResourceModel\Banner as ResourceModel;

class Banner extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
