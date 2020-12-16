<?php

namespace Mel\BannerSlider\Model;

use Mel\BannerSlider\Api\Data\SliderInterface;
use Mel\BannerSlider\Api\SliderRepositoryInterface;
use Mel\BannerSlider\Model\Data\SliderApiFactory as SliderApiModelFactory;
use Mel\BannerSlider\Model\ResourceModel\Slider as SliderResourceModel;

class SliderRepository implements SliderRepositoryInterface
{
    /**
     * @var SliderResourceModel
     */
    private $sliderResourceModel;
    /**
     * @var SliderApiModelFactory
     */
    private $sliderApiFactory;

    /**
     * SliderRepository constructor.
     * @param SliderResourceModel $sliderResourceModel
     * @param SliderApiModelFactory $sliderApiFactory
     */
    public function __construct(
        SliderResourceModel $sliderResourceModel,
        SliderApiModelFactory $sliderApiFactory
    ) {
        $this->sliderResourceModel = $sliderResourceModel;
        $this->sliderApiFactory = $sliderApiFactory;
    }

    /**
     * @return mixed
     */
    public function create()
    {
        /** @var  $sliderModel \Mel\BannerSlider\Model\Data\SliderApi */
        return $sliderModel = $this->sliderApiFactory->create();
    }

    /**
     * @param int $id
     * @return SliderInterface|Data\SliderApi
     */
    public function getById($id)
    {
        /** @var  $sliderModel \Mel\BannerSlider\Model\Data\SliderApi */
        $sliderModel = $this->sliderApiFactory->create();
        return $sliderModel->load($id);
    }

    /**
     * @param SliderInterface $slider
     * @return SliderInterface|Data\SliderApi|mixed
     * @throws \Exception
     */
    public function save(SliderInterface $slider)
    {
        $sliderName = $slider->getName();
        $slider->setName($sliderName);
        try {
            /** @var $slider \Mel\BannerSlider\Model\Data\SliderApi */
            $this->sliderResourceModel->save($slider);
        } catch (\Exception $ex) {
            throw new \Exception(__("Could not save"));
        }
        return $slider;
    }

    /**
     * @param SliderInterface $slider
     * @return SliderResourceModel|mixed
     * @throws \Exception
     */
    public function delete(SliderInterface $slider)
    {
        /** @var $slider \Mel\BannerSlider\Model\Data\SliderApi */
        return $slider = $this->sliderResourceModel->delete($slider);
    }

    /**
     * @param $id
     * @return mixed|void
     * @throws \Exception
     */
    public function deleteById($id)
    {
        $model = $this->load($id);
        $model = $this->delete($model);
        return $model;
    }

    /**
     * @param string $name
     * @return SliderInterface|Data\SliderApi
     */
    public function getByName($name)
    {
        /** @var  $sliderModel \Mel\BannerSlider\Model\Data\SliderApi */
        $sliderModel = $this->sliderApiFactory->create();
        return $sliderModel->load($name, 'name');
    }

    /**
     * @param $value
     * @param null $field
     * @return mixed
     */
    public function load($value, $field = null)
    {
        $model = $this->create();
        $this->sliderResourceModel->load($model, $value, $field);
        return $model;
    }
}
