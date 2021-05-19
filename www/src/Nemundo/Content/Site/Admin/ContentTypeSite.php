<?php


namespace Nemundo\Content\Site\Admin;



use Nemundo\Content\Page\Admin\ContentTypePage;
use Nemundo\Web\Site\AbstractSite;

class ContentTypeSite extends AbstractSite
{

    /**
     * @var ContentTypeSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Content Type';
        $this->url = 'content-type';
        ContentTypeSite::$site = $this;

    }

    public function loadContent()
    {

        (new ContentTypePage())->render();


    }


}