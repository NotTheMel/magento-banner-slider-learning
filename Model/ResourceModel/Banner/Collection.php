<?php

namespace Mel\BannerSlider\Model\ResourceModel\Banner;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Mel\BannerSlider\Model\Banner as Model;
use Mel\BannerSlider\Model\ResourceModel\Banner as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'banner_id';

    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }

    protected function _initSelect()
    {
        parent::_initSelect(); // TODO: Change the autogenerated stub
        $this->join(
            ['slider' => 'slider_table'],
            'main_table.slider_id = slider.slider_id'
        );
    }
}
