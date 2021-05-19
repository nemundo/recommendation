<?php


namespace Nemundo\Package\JqueryUi\Sortable;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\AbstractSiteTree;

abstract class AbstractSortableSite extends AbstractSite
{

    public function __construct(AbstractSiteTree $site = null)
    {

        $this->url = 'item-order';
        $this->menuActive = false;

        parent::__construct($site);
    }


    protected function getItemOrderList()
    {

        return $_POST['item'];

    }

}