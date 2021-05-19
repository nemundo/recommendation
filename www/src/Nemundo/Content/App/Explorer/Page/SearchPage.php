<?php

namespace Nemundo\Content\App\Explorer\Page;

use Nemundo\Content\App\Explorer\Com\Container\SearchContainer;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Template\ExplorerTemplate;


class SearchPage extends ExplorerTemplate
{

    public function getContent()
    {

        $contanier = new SearchContainer($this);
        $contanier->redirectSite = ExplorerSite::$site;

        return parent::getContent();

    }

}