<?php

namespace Nemundo\Package\Bootstrap\Carousel;


use Nemundo\Html\Listing\Li;
use Nemundo\Html\Listing\OrderedList;


class BootstrapCarouselIndicators extends OrderedList
{

    /**
     * @var string
     */
    public $carouselId;

    /**
     * @var int
     */
    public $itemCount;


    public function getContent()
    {

        $this->addCssClass('carousel-indicators');

        for ($n = 0; $n < $this->itemCount; $n++) {
            $li = new Li($this);
            if ($n == 0) {
                $li->addCssClass('active');
            }
            $li->addAttribute('data-bs-target', '#' . $this->carouselId);
            $li->addAttribute('data-bs-slide-to', $n);
        }

        return parent::getContent();

    }

}