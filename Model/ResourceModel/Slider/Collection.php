<?php

namespace Mel\BannerSlider\Model\ResourceModel\Slider;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Mel\BannerSlider\Model\ResourceModel\Slider as ResourceModel;
use Mel\BannerSlider\Model\Slider as Model;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'slider_id';

    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }

    /*protected func    tion _initSelect()
    {
        parent::_initSelect();
        $this->join(
            ['banner' => 'banner_table'],
            'main_table.slider_id = banner.slider_id'
        );
    }*/
}
