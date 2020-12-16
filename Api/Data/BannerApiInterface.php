<?php

namespace Mel\BannerSlider\Api\Data;

interface BannerApiInterface
{
    /**
     * @return string
     */
    public function getImage();

    /**
     * @param string $image
     * @return $this
     */
    public function setImage($image);

    /**
     * @return int
     */
    public function getBannerId();

    /**
     * @param $bannerId
     * @return $this
     */
    public function setBannerId($bannerId);
}