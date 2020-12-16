<?php

namespace Mel\BannerSlider\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Mel\BannerSlider\Model\ResourceModel\Banner\CollectionFactory as BannerCollection;

class Slider extends Template implements BlockInterface
{
    /**
     * @var BannerCollection
     */
    private $bannerCollection;

    /**
     * Slider constructor.
     * @param Template\Context $context
     * @param BannerCollection $bannerCollection
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        BannerCollection $bannerCollection,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->bannerCollection = $bannerCollection;
    }

    /**
     * @var string
     */
    protected $_template = "widget/slider.phtml";

    /**
     * @return mixed
     */
    public function getSlider()
    {
        $sliderId = $this->getData('slider_select');

        /** @var  $slider \Mel\BannerSlider\Model\ResourceModel\Banner\Collection */
        $banners = $this->bannerCollection->create();
        return $banners->addFieldToFilter('slider.slider_id', ['eq' => $sliderId])->getItems();
    }

}
