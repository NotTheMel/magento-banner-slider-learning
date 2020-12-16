<?php

namespace Mel\BannerSlider\Controller\Adminhtml\Save;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Mel\BannerSlider\Model\ResourceModel\Slider as SliderResource;
use Mel\BannerSlider\Model\ResourceModel\Slider\CollectionFactory as SliderCollectionFactory;
//use Mel\BannerSlider\Model\Slider;

class SaveSlider extends Action
{
    /**
     * @var \Magento\UrlRewrite\Model\UrlRewriteFactory
     */
    private $urlRewriteFactory;
    /**
     * @var SliderResource
     */
    private $sliderResourceModel;
    /**
     * @var SliderCollection|SliderCollectionFactory
     */
    private $sliderCollection;
    /**
     * @var \Mel\BannerSlider\Api\SliderRepositoryInterface
     */
    private $sliderRepository;
    /**
     * @var \Mel\BannerSlider\Api\Data\SliderInterface
     */
    private $sliderInterface;

    /**
     * SaveSlider constructor.
     * @param Context $context
     * @param Slider $sliderModel
     * @param SliderCollectionFactory $sliderCollection
     * @param \Magento\UrlRewrite\Model\UrlRewriteFactory $urlRewriteFactory
     * @param \Mel\BannerSlider\Api\SliderRepositoryInterface $sliderRepository
     * @param \Mel\BannerSlider\Api\Data\SliderInterface $sliderInterface
     * @param SliderResource $sliderResourceModel
     */
    public function __construct(
        Context $context,
        //Slider $sliderModel,
        //SliderCollectionFactory $sliderCollection,
        \Magento\UrlRewrite\Model\UrlRewriteFactory $urlRewriteFactory,
        \Mel\BannerSlider\Api\SliderRepositoryInterface $sliderRepository,
        \Mel\BannerSlider\Api\Data\SliderInterface $sliderInterface,
        SliderResource $sliderResourceModel
    ) {
        parent::__construct($context);
        //$this->sliderModel = $sliderModel;
        $this->urlRewriteFactory = $urlRewriteFactory;
        $this->sliderResourceModel = $sliderResourceModel;
        //$this->sliderCollection = $sliderCollection;
        $this->sliderRepository = $sliderRepository;
        $this->sliderInterface = $sliderInterface;
    }

    public function execute()
    {
        $slider_name = $this->getRequest()->getParam('name');
        //$sliderModel = $this->sliderModel;
        $sliderModel = $this->sliderInterface;
        if (!$this->isSliderNameExists($slider_name)) {

            $sliderModel->setName($slider_name);
            $this->sliderRepository->save($sliderModel);

            $this->messageManager->addSuccessMessage(__("Successfully added"));
        } else {
            $this->messageManager->addErrorMessage(__("Name already exists. Please choose different"));
            return $this->resultRedirectFactory->create()->setPath('slider/add/slider');
        }
        return $this->resultRedirectFactory->create()->setPath('slider/view/sliders');
    }

    /** check if slider name exists in table or not
     * @param $name
     * @return bool
     */
    private function isSliderNameExists($name)
    {
        $slider = $this->sliderRepository->getByName($name);
        if ($slider->getSliderId()) {
            return true;
        } else {
            return false;
        }
    }
}
