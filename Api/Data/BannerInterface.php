<?php

namespace Mel\BannerSlider\Api\Data;

interface BannerInterface
{
    const KEY_BANNER_ID = 'banner_id';
    const KEY_SLIDER_ID = 'slider_id';
    const KEY_IMAGE     = 'image';

    /**
     * @return int
     */
    public function getBannerId();

    /**
     * @param int $id
     * @return void
     */
    public function setBannerId($id);

    /**
     * @return int
     */
    public function getSliderId();

    /**
     * @param $id
     * @return void
     */
    public function setSliderId($id);

    /**
     * @return string
     */
    public function getImage();

    /**
     * @param $image
     * @return void
     */
    public function setImage($image);
}
