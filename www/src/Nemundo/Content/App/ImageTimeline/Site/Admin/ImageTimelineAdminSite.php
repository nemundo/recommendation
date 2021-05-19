<?php


namespace Nemundo\Content\App\ImageTimeline\Site\Admin;


use Nemundo\Content\App\ImageTimeline\Page\Admin\ImageTimelineAdminPage;
use Nemundo\Web\Site\AbstractSite;

class ImageTimelineAdminSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title='Image Timeline';
        $this->url='image-timeline';

        new ImageTimelineDeleteSite($this);

    }


    public function loadContent()
    {

        (new ImageTimelineAdminPage())->render();

    }

}