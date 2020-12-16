<?php

namespace Mel\BannerSlider\Model\Data;

use Mel\BannerSlider\Api\Data\SliderInterface;

class SliderApi extends \Magento\Catalog\Model\AbstractModel implements SliderInterface
{
    protected function _construct()
    {
        $this->_init(\Mel\BannerSlider\Model\ResourceModel\Slider::class);
    }

    /**
     * @return mixed|null
     */
    public function getSliderId()
    {
        return $this->_getData(self::KEY_SLIDER_ID);
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function setSliderId($id)
    {
        $this->setData(self::KEY_SLIDER_ID, $id);
    }

    /**
     * @return mixed|null
     */
    public function getName()
    {
        return $this->_getData(self::KEY_NAME);
    }

    /**
     * @param $name
     * @return mixed|void
     */
    public function setName($name)
    {
        $this->setData(self::KEY_NAME, $name);
    }
}
