<?php


namespace Nemundo\Content\App\Feed\Site\Admin;


use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Content\App\Feed\Content\Feed\FeedContentType;
use Nemundo\Content\App\Feed\Parameter\FeedParameter;
use Nemundo\Core\Http\Url\UrlReferer;

class FeedDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var FeedDeleteSite
     */
    public static $site;

    protected function loadSite()
    {

        parent::loadSite();

        $this->url='feed-delete';
        FeedDeleteSite::$site=$this;

    }


    public function loadContent()
    {

        $feedId=(new FeedParameter())->getValue();

        // run as job
        (new FeedContentType($feedId))->deleteType();

        (new UrlReferer())->redirect();

    }

}