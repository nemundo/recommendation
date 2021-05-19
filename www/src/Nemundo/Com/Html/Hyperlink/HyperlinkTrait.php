<?php

namespace Nemundo\Com\Html\Hyperlink;


use Nemundo\Com\Container\ContainerUserRestrictionTrait;
use Nemundo\Html\Hyperlink\HyperlinkTarget;

trait HyperlinkTrait
{

    use ContainerUserRestrictionTrait;

    /**
     * @var bool
     */
    public $openNewWindow = false;


    protected function loadHyperlink()
    {

        if ($this->openNewWindow) {
            $this->target = HyperlinkTarget::BLANK;
        }

    }

}