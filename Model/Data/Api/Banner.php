<?php

namespace Mel\BannerSlider\Model\Data\Api;

use Magento\Framework\DataObject;
use Mel\BannerSlider\Api\Data\BannerApiInterface;

class Banner extends DataObject implements BannerApiInterface
{
    /**
     * @return array|int|mixed|null
     */
    public function getBannerId()
    {
        return $this->getData('banner_id');
    }

    /**
     * @param $bannerId
     * @return $this
     */
    public function setBannerId($bannerId)
    {
        return $this->setData('banner_id', $bannerId);
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->getData('image');
    }

    /**
     * @param string $image
     * @return $this
     */
    public function setImage($image)
    {
        return $this->setData('image', $image);
    }
}
