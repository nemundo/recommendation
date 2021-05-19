<?php


namespace Nemundo\Content\App\ImageTimeline\Site\Admin;


use Nemundo\Content\App\ImageTimeline\Content\ImageTimeline\ImageTimelineContentType;
use Nemundo\Content\App\ImageTimeline\Parameter\ImageTimelineParameter;
use Nemundo\Content\App\ImageTimeline\Site\ImageTimelineSite;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class ImageTimelineDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var ImageTimelineDeleteSite
     */
    public static $site;

    protected function loadSite()
    {

        parent::loadSite();
        ImageTimelineDeleteSite::$site=$this;

    }

    public function loadContent()
    {

        (new ImageTimelineContentType((new ImageTimelineParameter())->getValue()))->deleteType();
        (new UrlReferer())->redirect();

    }

}