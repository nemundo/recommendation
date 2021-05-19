<?php

namespace Nemundo\Content\App\Explorer\Site\_Share;

use Nemundo\Content\App\Explorer\Data\PublicShare\PublicShare;
use Nemundo\Content\App\Explorer\Page\_Share\PublicShareEditPage;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Web\Site\AbstractSite;

class PublicShareEditSite extends AbstractSite
{

    /**
     * @var PublicShareEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Public share';
        $this->url = 'public-share-edit';
        $this->menuActive = false;
        PublicShareEditSite::$site = $this;

        new PublicShareDeleteSite($this);

    }

    public function loadContent()
    {

        $data= new PublicShare();
        $data->ignoreIfExists=true;
        $data->contentId = (new ContentParameter())->getValue();
        $data->save();

        (new UrlReferer())->redirect();

        //(new PublicShareEditPage())->render();

    }
}