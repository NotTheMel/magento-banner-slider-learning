<?php

namespace Mel\BannerSlider\Api;

use Mel\BannerSlider\Api\Data\SliderInterface;

interface SliderRepositoryInterface
{
    /**
     * @param $id
     * @return SliderInterface
     */
    public function getById($id);

    /**
     * @param SliderInterface $slider
     * @return mixed
     */
    public function save(SliderInterface $slider);

    /**
     * @param SliderInterface $slider
     * @return mixed
     */
    public function delete(SliderInterface $slider);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteById($id);

    /**
     * @param $name
     * @return SliderInterface
     */
    public function getByName($name);
}
