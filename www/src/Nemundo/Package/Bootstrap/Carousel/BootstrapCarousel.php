<?php

namespace Nemundo\Package\Bootstrap\Carousel;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Bootstrap\Carousel\Control\BootstrapCarouselNextControl;
use Nemundo\Package\Bootstrap\Carousel\Control\BootstrapCarouselPreviousControl;


class BootstrapCarousel extends AbstractHtmlContainer
{

    /**
     * @var bool
     */
    public $slideEffect = true;

    /**
     * @var bool
     */
    public $slideshow = false;

    /**
     * @var int
     */
    public $slideshowInterval = 5;

    /**
     * @var bool
     */
    public $keyboardNavigation = true;

    /**
     * @var bool
     */
    public $showIndicator = true;

    /**
     * @var bool
     */
    public $showControl = true;

    /**
     * @var bool
     */
    public $stopAtTheEnd = true;

    /**
     * @var Div
     */
    private $carousel;

    /**
     * @var int
     */
    private $itemCount = 0;

    private static $carouselCount = 0;


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->carousel = new Div();
        $this->carousel->addCssClass('carousel-inner');

        parent::addContainer($this->carousel);

    }


    public function getContent()
    {

        BootstrapCarousel::$carouselCount++;

        $this->tagName = 'div';
        $this->id = 'carousel_' . BootstrapCarousel::$carouselCount;

        $this->addCssClass('carousel');
        $this->addAttribute('data-bs-ride', 'carousel');

        if ($this->slideshow) {
            $this->addAttribute('data-bs-ride', 'carousel');
            $this->addAttribute('data-bs-interval', $this->slideshowInterval * 1000);
        } else {
            $this->addAttribute('data-bs-interval', 'false');
        }

        if ($this->slideEffect) {
            $this->addCssClass('slide');
        }

        if ($this->stopAtTheEnd) {
            $this->addAttribute('data-bs-wrap', 'false');
        }

        if ($this->showIndicator) {

            $indicator = new BootstrapCarouselIndicators();
            $indicator->carouselId = $this->id;
            $indicator->itemCount = $this->itemCount;
            parent::addContainer($indicator);

        }

        if ($this->showControl) {

            $previous = new BootstrapCarouselPreviousControl();
            $previous->carouselId = $this->id;
            parent::addContainer($previous);

            $next = new BootstrapCarouselNextControl();
            $next->carouselId = $this->id;
            parent::addContainer($next);

        }

        return parent::getContent();

    }


    /**
     * @param BootstrapCarouselItem $container
     */
    public function addContainer(AbstractContainer $container)
    {

        if ($container->isObjectOfClass(BootstrapCarouselItem::class)) {
            $this->carousel->addContainer($container);

            if ($this->itemCount == 0) {
                $container->addCssClass('active');
            }

            $this->itemCount++;

        } else {
            (new LogMessage())->writeError('It is not a BootstrapCarouselItem Class');
        }

    }

}