<?php

namespace Nemundo\Html\Hyperlink;

use Nemundo\Html\Container\AbstractContentContainer;


abstract class AbstractHyperlink extends AbstractContentContainer
{

    /**
     * @var string
     */
    protected $href;

    /**
     * @var string
     */
    protected $target;

    /**
     * @var int
     */
    protected $tabindex;

    /**
     * @var bool
     */
    public $download = false;

    public function getContent()
    {

        $this->tagName = 'a';
        $this->returnOneLine = true;

        $this->addAttribute('href', $this->href);
        $this->addAttribute('target', $this->target);
        $this->addAttribute('tabindex', $this->tabindex);

        if ($this->download) {
            $this->addAttributeWithoutValue('download');
        }

        return parent::getContent();

    }

}
