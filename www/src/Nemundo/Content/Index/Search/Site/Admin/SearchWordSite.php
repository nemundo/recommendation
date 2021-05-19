<?php


namespace Nemundo\Content\Index\Search\Site;


use Nemundo\Content\Index\Search\Page\SearchWordPage;
use Nemundo\Web\Site\AbstractSite;

class SearchWordSite extends AbstractSite
{

    protected function loadSite()
    {
        $this->title = 'Search Word';
        $this->url = 'search-word';
        // TODO: Implement loadSite() method.
    }


    public function loadContent()
    {

        (new SearchWordPage())->render();

    }

}