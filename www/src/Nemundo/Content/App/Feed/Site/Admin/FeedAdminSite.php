<?php


namespace Nemundo\Content\App\Feed\Site\Admin;


use Nemundo\Content\App\Feed\Page\Admin\FeedAdminPage;
use Nemundo\Web\Site\AbstractSite;

class FeedAdminSite extends AbstractSite
{

    /**
     * @var FeedAdminSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Feed';
        $this->url = 'feed-admin';

        FeedAdminSite::$site = $this;

        new FeedNewSite($this);
        new WebCrawlerSite($this);
        new FeedDeleteSite($this);

    }


    public function loadContent()
    {

        (new FeedAdminPage())->render();

    }

}