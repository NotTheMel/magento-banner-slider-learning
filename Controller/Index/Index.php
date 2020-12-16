<?php

namespace Mel\BannerSlider\Controller\Index;

use Magento\Framework\App\ActionInterface as Action;
use Mel\BannerSlider\Model\ResourceModel\Banner\CollectionFactory as BannerCollection;
use Magento\Framework\Api\Search\FilterGroupBuilder;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;

class Index implements Action
{
    /**
     * @var \Mel\BannerSlider\Api\BannerRepositoryInterface
     */
    private $bannerRepository;
    /**
     * @var \Mel\BannerSlider\Api\Data\BannerInterface
     */
    private $banner;
    /**
     * @var BannerCollection
     */
    private $bannerCollection;
    /**
     * @var FilterGroupBuilder
     */
    private FilterGroupBuilder $filterGroupBuilder;
    /**
     * @var FilterBuilder
     */
    private FilterBuilder $filterBuilder;
    /**
     * @var SearchCriteriaInterface
     */
    private SearchCriteriaInterface $searchCriteria;
    private \Magento\Framework\DataObjectFactory $dataObject;

    /**
     * Index constructor.
     * @param \Mel\BannerSlider\Api\BannerRepositoryInterface $bannerRepository
     * @param \Mel\BannerSlider\Api\Data\BannerInterface $banner
     * @param BannerCollection $bannerCollection
     * @param FilterGroupBuilder $filterGroupBuilder
     * @param FilterBuilder $filterBuilder
     * @param SearchCriteriaInterface $searchCriteria
     * @param \Magento\Framework\DataObjectFactory $dataObject
     */
    public function __construct(
        \Mel\BannerSlider\Api\BannerRepositoryInterface $bannerRepository,
        \Mel\BannerSlider\Api\Data\BannerInterface $banner,
        BannerCollection $bannerCollection,
        FilterGroupBuilder $filterGroupBuilder,
        FilterBuilder $filterBuilder,
        SearchCriteriaInterface $searchCriteria,
        \Magento\Framework\DataObjectFactory $dataObject
    ) {
        $this->bannerRepository = $bannerRepository;
        $this->banner = $banner;
        $this->bannerCollection = $bannerCollection;
        $this->filterGroupBuilder = $filterGroupBuilder;
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteria = $searchCriteria;
        $this->dataObject = $dataObject;
    }

    /** This route and controller used just for testing purpose
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $slider = $this->bannerRepository->getBySliderId(2);
        foreach ($slider as $s)
        {
            var_dump($s);
        }
        die;
    }
}
