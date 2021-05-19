<?php

namespace Nemundo\Admin\Com\Table\Row;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\AbstractSite;

class AdminClickableTableRow extends BootstrapClickableTableRow
{

    public function addSite(AbstractSite $site)
    {

        $hyperlink = new SiteHyperlink($this);
        $hyperlink->site = $site;
        $hyperlink->addCssClass('text-decoration-none');
        //$hyperlink->addCssClass('text-muted');
        return $this;

    }


    public function setActiveRow() {
        $this->addCssClass('table-active');
        return $this;
    }

}