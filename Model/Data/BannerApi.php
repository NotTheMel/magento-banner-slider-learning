<?php

namespace Mel\BannerSlider\Model\Data;

use Mel\BannerSlider\Api\Data\BannerInterface;

class BannerApi extends \Magento\Catalog\Model\AbstractModel implements BannerInterface
{
    protected function _construct()
    {
        $this->_init(\Mel\BannerSlider\Model\ResourceModel\Banner::class);
    }

    /**
     * @return int
     */
    public function getBannerId()
    {
        return $this->_getData(self::KEY_BANNER_ID);
    }

    /**
     * @param int $id
     * @return void
     */
    public function setBannerId($id)
    {
        $this->setData(self::KEY_BANNER_ID, $id);
    }

    /**
     * @return int
     */
    public function getSliderId()
    {
        return $this->_getData(self::KEY_SLIDER_ID);
    }

    /**
     * @param int $id
     */
    public function setSliderId($id)
    {
        $this->setData(self::KEY_BANNER_ID, $id);
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->_getData(self::KEY_IMAGE);
    }

    /**
     * @param $image
     */
    public function setImage($image)
    {
        $this->setData(self::KEY_IMAGE, $image);
    }
}
