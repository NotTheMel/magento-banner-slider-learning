<?php

namespace Mel\BannerSlider\Model;

use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\FilterGroupBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Api\SortOrder;
use Mel\BannerSlider\Api\BannerRepositoryInterface;
use Mel\BannerSlider\Api\Data\BannerApiInterfaceFactory;
use Mel\BannerSlider\Api\Data\BannerInterface;
use Mel\BannerSlider\Model\Data\BannerApiFactory;
use Mel\BannerSlider\Model\ResourceModel\Banner as BannerResourceModel;
use Mel\BannerSlider\Model\ResourceModel\Banner\CollectionFactory;

class BannerRepository implements BannerRepositoryInterface
{
    /**
     * @var BannerApiFactory
     */
    private $bannerApi;
    /**
     * @var BannerResourceModel
     */
    private $bannerResourceModel;
    /**
     * @var FilterBuilder
     */
    private $filterBuilder;
    /**
     * @var FilterGroupBuilder
     */
    private $filterGroupBuilder;
    /**
     * @var SearchCriteriaInterface
     */
    private $searchCriteria;
    /**
     * @var SearchResultsInterfaceFactory
     */
    private $searchResultsInterface;
    /**
     * @var CollectionFactory
     */
    private $bannerCollection;
    /**
     * @var \Magento\Framework\DataObjectFactory
     */
    private $dataObject;
    /**
     * @var BannerApiInterfaceFactory
     */
    private $bannerApiInterface;

    /**
     * BannerRepository constructor.
     * @param BannerApiFactory $bannerApi
     * @param BannerResourceModel $bannerResourceModel
     * @param FilterBuilder $filterBuilder
     * @param FilterGroupBuilder $filterGroupBuilder
     * @param SearchCriteriaInterface $searchCriteria
     * @param SearchResultsInterfaceFactory $searchResultsInterface
     * @param CollectionFactory $bannerCollection
     * @param \Magento\Framework\DataObjectFactory $dataObject
     * @param BannerApiInterfaceFactory $bannerApiInterface
     */
    public function __construct(
        BannerApiFactory $bannerApi,
        BannerResourceModel $bannerResourceModel,
        FilterBuilder $filterBuilder,
        FilterGroupBuilder $filterGroupBuilder,
        SearchCriteriaInterface $searchCriteria,
        SearchResultsInterfaceFactory $searchResultsInterface,
        CollectionFactory $bannerCollection,
        \Magento\Framework\DataObjectFactory $dataObject,
        BannerApiInterfaceFactory $bannerApiInterface
    ) {
        $this->bannerApi = $bannerApi;
        $this->bannerResourceModel = $bannerResourceModel;
        $this->filterBuilder = $filterBuilder;
        $this->filterGroupBuilder = $filterGroupBuilder;
        $this->searchCriteria = $searchCriteria;
        $this->searchResultsInterface = $searchResultsInterface;
        $this->bannerCollection = $bannerCollection;
        $this->dataObject = $dataObject;
        $this->bannerApiInterface = $bannerApiInterface;
    }

    /**
     * @return mixed
     */
    public function create()
    {
        /** @var  $bannerModel \Mel\BannerSlider\Model\Data\BannerApi */
        return $bannerModel = $this->bannerApi->create();
    }

    /**
     * @param int $id
     * @return BannerInterface|mixed
     */
    public function getById($id)
    {
        return $this->load($id);
    }

    /**
     * @param int $id
     * @return \Magento\Framework\DataObject[]|BannerInterface|BannerResourceModel\Collection
     */
    public function getBySliderId($id)
    {
        $collection = $this->getCollection();
        return $collection->addFieldToFilter('slider.slider_id', ['eq' => $id]);
    }

    /**
     * @param BannerInterface $banner
     * @return BannerInterface|Data\BannerApi|mixed
     * @throws \Exception
     */
    public function save(BannerInterface $banner)
    {
        $sliderId = $banner->getSliderId();
        $image    = $banner->getImage();
        $banner->setSliderId($sliderId);
        $banner->setImage($image);
        try {
            /** @var $banner \Mel\BannerSlider\Model\Data\BannerApi */
            $this->bannerResourceModel->save($banner);
        } catch (\Exception $ex) {
            throw new \Exception(__("Unable to save"));
        }
        return $banner;
    }

    /**
     * @return \Mel\BannerSlider\Model\ResourceModel\Banner\Collection
     */
    public function getCollection()
    {
        return $this->bannerCollection->create();
    }

    /**
     * @param BannerInterface $banner
     * @return BannerResourceModel|mixed
     * @throws \Exception
     */
    public function delete(BannerInterface $banner)
    {
        /** @var $banner \Mel\BannerSlider\Model\Data\BannerApi */
        return $banner = $this->bannerResourceModel->delete($banner);
    }

    /**
     * @param $id
     * @return BannerInterface|Data\BannerApi|mixed
     */
    public function deleteById($id)
    {
        $model = $this->load($id);
        $model = $this->delete($model);
        return $model;
    }

    /**
     * @param $value
     * @param null $field
     * @return mixed
     */
    public function load($value, $field = null)
    {
        $model = $this->create();
        $this->bannerResourceModel->load($model, $value, $field);
        return $model;
    }

    /**
     * @param SearchCriteriaInterface $criteria
     * @return \Magento\Framework\Api\SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        /** @var  $searchResults \Magento\Framework\Api\SearchResultsInterface */
        $searchResults = $this->searchResultsInterface->create();
        $searchResults->setSearchCriteria($criteria);
        /** @var  $collection \Mel\BannerSlider\Model\ResourceModel\Banner\Collection */
        $collection = $this->bannerCollection->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            $fields = [];
            $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
                $fields[] = $filter->getField();
                $conditions[] = [$condition => $filter->getValue()];
            }
            if ($fields) {
                $collection->addFieldToFilter($fields, $conditions);
            }
        }
        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        $objects = [];
        foreach ($collection as $objectModel) {
            $objects[] = $objectModel;
        }
        $searchResults->setItems($objects);
        return $searchResults;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getBannersBySliderId($id)
    {
        $banners = $this->getBySliderId($id);
        $data    = [];
        foreach ($banners as $banner) {
            /** @var \Mel\BannerSlider\Api\Data\BannerApiInterface $bannerApi */
            $bannerApi = $this->bannerApiInterface->create();
            $data[] = $bannerApi
                ->setImage($banner->getImage())
                ->setBannerId($banner->getBannerId());
        }
        return $data;
    }

//    /**
//     * @param $banners
//     * @return array
//     */
//    public function toArrayGetBannerBySlider($banners)
//    {
//        /** @var  $obj \Magento\Framework\DataObject */
//        $obj = $this->dataObject->create();
//        foreach ($banners as $banner) {
//            $lists[] = [
//                'banner_id' => $banner->getBannerId(),
//                'image' => $banner->getImage(),
//            ];
//        }
//        $obj->setData($lists);
//        return $obj->getData();
//    }
}
