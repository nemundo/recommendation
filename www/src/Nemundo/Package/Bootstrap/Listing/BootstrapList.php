<?php

namespace Nemundo\Package\Bootstrap\Listing;


use Nemundo\Html\Block\Div;
use Nemundo\Html\Listing\Li;

// BootstrapListing
class BootstrapList extends Div
{

    public function getContent()
    {

        $this->addCssClass('list-group');
        return parent::getContent();

    }


    public function addText($text, $count = null)
    {

        $li = new Li($this);
        $li->addCssClass('list-group-item');
        $li->content = $text;

        if ($count !== null) {

            $li->addCssClass('d-flex justify-content-between align-items-center');

            $badge = new BootstrapBadge($li);
            $badge->content = $count;

        }

        return $this;

    }


    public function addActiveText($text, $count = null)
    {

        $li = new Li($this);
        $li->addCssClass('list-group-item active');
        $li->content = $text;

        if ($count !== null) {

            $li->addCssClass('d-flex justify-content-between align-items-center');

            $badge = new BootstrapBadge($li);
            $badge->content = $count;

        }

        return $this;

    }

}