<?php

namespace Nemundo\Content\App\Explorer\Site\Mobile;

use Nemundo\Content\App\Explorer\Page\Mobile\ExplorerMobilePage;
use Nemundo\Content\App\Explorer\Page\ExplorerPage;

use Nemundo\Content\App\Explorer\Store\HomeContentIdStore;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Web\Site\AbstractSite;

class ExplorerMobileSite extends AbstractSite
{

    /**
     * @var ExplorerMobileSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Mobile';
        $this->url = 'mobile';

        ExplorerMobileSite::$site=$this;

        new NewMobileSite($this);

    }

    public function loadContent()
    {


        $contentParameter = new ContentParameter();
        if ($contentParameter->exists()) {
            //(new ExplorerPage())->render();
            (new ExplorerMobilePage())->render();
        } else {

            $contentId = (new HomeContentIdStore())->getValue();

            $site = clone(ExplorerMobileSite::$site);
            $site->addParameter(new ContentParameter($contentId));
            $site->redirect();

        }

    }
}