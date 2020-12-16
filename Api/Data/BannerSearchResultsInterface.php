<?php

namespace Mel\BannerSlider\Api\Data;

interface BannerSearchResultsInterface
{
    /**
     * @return \Mel\BannerSlider\Api\Data\BannerInterface[]
     */
    public function getItems();

    /**
     * @param \Mel\BannerSlider\Api\Data\BannerInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
