<?php

namespace Nemundo\Package\Fancybox;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Hyperlink\AbstractHyperlink;

abstract class AbstractFancyboxHyperlink extends AbstractHyperlink
{

    use LibraryTrait;

    /**
     * @var string
     */
    protected $imageUrl;

    /**
     * @var string
     */
    protected $caption;

    public function getContent()
    {

        $this->addPackage(new FancyboxPackage());

        $this->addAttribute('data-fancybox', 'gallery');
        $this->addAttribute('data-caption',$this->caption);

        $this->href = $this->imageUrl;

        return parent::getContent();

    }

}