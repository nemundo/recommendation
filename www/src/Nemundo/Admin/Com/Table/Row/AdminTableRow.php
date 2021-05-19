<?php

namespace Nemundo\Admin\Com\Table\Row;


use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Web\Site\AbstractSite;

class AdminTableRow extends TableRow
{

    public function addSite(AbstractSite $site)
    {

        $hyperlink = new SiteHyperlink($this);
        $hyperlink->site = $site;
        $hyperlink->addCssClass('text-decoration-none');
        return $this;

    }

}