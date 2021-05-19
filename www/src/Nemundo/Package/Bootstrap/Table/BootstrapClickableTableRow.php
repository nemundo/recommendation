<?php

namespace Nemundo\Package\Bootstrap\Table;


use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Web\Site\AbstractSite;

class BootstrapClickableTableRow extends TableRow
{

    public function addClickableSite(AbstractSite $site = null)
    {
        if ($site !== null) {
            $this->addClickableUrl($site->getUrl());
        }
    }


    public function addClickableUrl($url)
    {
        $this->addCssClass('clickable-row');
        $this->addAttribute('data-href', $url);
    }

}