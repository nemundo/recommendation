<?php


namespace Nemundo\Content\Site\Admin;


use Nemundo\Content\Page\Admin\ContentListingPage;
use Nemundo\Web\Site\AbstractSite;


class ContentListingSite extends AbstractSite
{

    /**
     * @var ContentListingSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Listing';
        $this->url = 'content-listing';

        ContentListingSite::$site = $this;

    }


    public function loadContent()
    {

        (new ContentListingPage())->render();

    }

}