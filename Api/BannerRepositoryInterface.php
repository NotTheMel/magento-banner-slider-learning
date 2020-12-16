<?php

namespace Mel\BannerSlider\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Mel\BannerSlider\Api\Data\BannerInterface;

interface BannerRepositoryInterface
{
    /**
     * @api
     * @param string $id
     * @return BannerInterface
     */
    public function getById($id);

    /**
     * @api
     * @param int $id
     * @return \Magento\Framework\DataObject[]|BannerInterface
     */
    public function getBySliderId($id);

    /**
     * @param BannerInterface $banner
     * @return mixed
     */
    public function save(BannerInterface $banner);

    /**
     * @param BannerInterface $banner
     * @return mixed
     */
    public function delete(BannerInterface $banner);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteById($id);

    /**
     * Get Banners by Slider Id
     *
     * @api
     * @param int $id
     * @return \Mel\BannerSlider\Api\Data\BannerApiInterface[]
     */
    public function getBannersBySliderId($id);

    /**
     * @api
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Mel\BannerSlider\Api\Data\BannerSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria);
}
