<?php

namespace Nemundo\Package\Bootstrap\Carousel\Control;


use Nemundo\Html\Hyperlink\AbstractHyperlink;
use Nemundo\Html\Inline\Span;

abstract class AbstractBootstrapCarouselControlContainer extends AbstractHyperlink
{

    /**
     * @var string
     */
    public $carouselId;

    /**
     * @var string
     */
    protected $controlName;


    public function getContent()
    {

        $this->addCssClass('carousel-control-' . $this->controlName);
        $this->addAttribute('role', 'button');
        $this->addAttribute('data-bs-slide', $this->controlName);
        $this->href = '#' . $this->carouselId;

        $span = new Span($this);
        $span->addCssClass('carousel-control-' . $this->controlName . '-icon');
        $span->addAttribute('aria-hidden', 'true');

        $span = new Span($this);
        $span->addCssClass('sr-only');
        $span->content =$this->controlName;

        return parent::getContent();

    }

}