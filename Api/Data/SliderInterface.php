<?php

namespace Mel\BannerSlider\Api\Data;

interface SliderInterface
{
    const KEY_SLIDER_ID = 'slider_id';
    const KEY_NAME      = 'name';

    /**
     * @return mixed
     */
    public function getSliderId();

    /**
     * @param $id
     * @return mixed
     */
    public function setSliderId($id);

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name);
}
