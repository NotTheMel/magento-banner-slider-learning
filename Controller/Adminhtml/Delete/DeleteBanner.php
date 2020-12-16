<?php

namespace Mel\BannerSlider\Controller\Adminhtml\Delete;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Mel\BannerSlider\Api\BannerRepositoryInterface;

class DeleteBanner extends Action
{
    /**
     * @var BannerRepositoryInterface
     */
    private BannerRepositoryInterface $bannerRepository;
    /**
     * Delete constructor.
     * @param Context $context
     * @param BannerRepositoryInterface $bannerRepository
     */
    public function __construct(
        Context $context,
        BannerRepositoryInterface $bannerRepository
    )
    {
        parent::__construct($context);
        $this->bannerRepository = $bannerRepository;
    }

    public function execute()
    {
        $bannerId = $this->getRequest()->getParam('banner_id');
        try {
            $this->bannerRepository->deleteById($bannerId);
            $this->messageManager->addSuccessMessage(__("Successfully deleted banner"));
        }catch (\Exception $ex) {
            $this->messageManager->addErrorMessage(__("Ops something went wrong. Couldn't delete banner"));
            return $this->resultRedirectFactory->create()->setPath('slider/view');
        }
        return $this->resultRedirectFactory->create()->setPath('slider/view');
    }
}
