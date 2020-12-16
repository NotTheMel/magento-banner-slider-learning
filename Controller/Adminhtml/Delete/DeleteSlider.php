<?php

namespace Mel\BannerSlider\Controller\Adminhtml\Delete;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Mel\BannerSlider\Api\SliderRepositoryInterface;

class DeleteSlider extends Action
{
    /**
     * @var SliderRepositoryInterface
     */
    private SliderRepositoryInterface $sliderRepository;

    /**
     * Delete constructor.
     * @param Context $context
     * @param SliderRepositoryInterface $sliderRepository
     */
    public function __construct(
        Context $context,
        SliderRepositoryInterface $sliderRepository
    )
    {
        parent::__construct($context);
        $this->sliderRepository = $sliderRepository;
    }

    public function execute()
    {
        $sliderId = $this->getRequest()->getParam('slider_id');
        try {
            $this->sliderRepository->deleteById($sliderId);
            $this->messageManager->addSuccessMessage(__("Successfully deleted banner"));
        }catch (\Exception $ex) {
            $this->messageManager->addErrorMessage(__("Ops something went wrong. Couldn't delete banner"));
            return $this->resultRedirectFactory->create()->setPath('slider/view/sliders');
        }
        return $this->resultRedirectFactory->create()->setPath('slider/view/sliders');
    }
}
