<?php

namespace Mel\BannerSlider\Controller\Adminhtml\Save;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Mel\BannerSlider\Model\Banner;
use Mel\BannerSlider\Model\Slider;

class Save extends Action
{
    /**
     * @var \Magento\UrlRewrite\Model\UrlRewriteFactory
     */
    private $urlRewriteFactory;
    /**
     * @var Slider
     */
    private $sliderModel;
    /**
     * @var Banner
     */
    private $bannerModel;

    /**
     * Save constructor.
     * @param Context $context
     * @param \Magento\UrlRewrite\Model\UrlRewriteFactory $urlRewriteFactory
     * @param Slider $sliderModel
     * @param Banner $bannerModel
     */
    public function __construct(
        Context $context,
        \Magento\UrlRewrite\Model\UrlRewriteFactory $urlRewriteFactory,
        Slider $sliderModel,
        Banner $bannerModel
    ) {
        parent::__construct($context);
        $this->urlRewriteFactory = $urlRewriteFactory;
        $this->sliderModel = $sliderModel;
        $this->bannerModel = $bannerModel;
    }

    public function execute()
    {
        $slider_id = $this->getRequest()->getParam('slider_id');
        $image     = $this->getRequest()->getParam('image')[0]['url'];
        try {
            $bannerModel = $this->bannerModel;
            $bannerModel->setSliderId($slider_id);
            $bannerModel->setImage($image);
            $bannerModel->save();
            $this->messageManager->addSuccessMessage(__('Successfully added'));
        } catch (\Exception $ex) {
            $this->messageManager->addErrorMessage(__('Ops something went wrong'));
            return $this->resultRedirectFactory->create()->setPath('slider/view');
        }
        return $this->resultRedirectFactory->create()->setPath('slider/view');
    }
}
