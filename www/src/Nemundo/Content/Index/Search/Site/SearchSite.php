<?php


namespace Nemundo\Content\Index\Search\Site;


use Nemundo\Content\Index\Search\Page\SearchPage;
use Nemundo\Content\Index\Search\Site\Json\SearchContentTypeJsonSite;
use Nemundo\Content\Index\Search\Site\Json\SearchJsonSite;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Web\Site\AbstractSite;


// ContentSearchSite
class SearchSite extends AbstractSite
{

    /**
     * @var SearchSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title[LanguageCode::EN] = 'Search';
        $this->title[LanguageCode::DE] = 'Suche';
        $this->url = 'search';
        SearchSite::$site = $this;

        new SearchJsonSite($this);
        new SearchContentTypeJsonSite($this);

    }


    public function loadContent()
    {

        (new SearchPage())->render();

    }

}