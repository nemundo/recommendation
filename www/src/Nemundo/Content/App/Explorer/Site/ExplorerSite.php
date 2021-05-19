<?php

namespace Nemundo\Content\App\Explorer\Site;

use Nemundo\Content\App\Explorer\Content\Base\BaseContainerContentType;
use Nemundo\Content\App\Explorer\Page\ExplorerPage;

use Nemundo\Content\App\Explorer\Site\Json\JsonExportSite;
use Nemundo\Content\App\Explorer\Site\Json\JsonImportSite;
use Nemundo\Content\App\Explorer\Site\_Share\PrivateShareSite;
use Nemundo\Content\App\Explorer\Site\_Share\PublicShareEditSite;
use Nemundo\Content\App\Explorer\Store\HomeContentIdStore;
use Nemundo\Content\App\Favorite\Site\FavoriteSite;

use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Web\Site\AbstractSite;

class ExplorerSite extends AbstractSite
{

    /**
     * @var ExplorerSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Explorer';
        $this->url = 'explorer';
        ExplorerSite::$site = $this;


        //new ContentSite($this);
        new NewSite($this);
        //new TreeSite($this);
        new ViewEditSite($this);
        new ListingSite($this);


        //new CalendarSite($this);


        //new OldNewSite($this);
        new ContentEditSite($this);

        //new ItemSite($this);


        new ContentRemoveSite($this);
        new ContentDeleteSite($this);
        //new ContentSortableSite($this);


        new AttachToSite($this);
        new MoveToSite($this);
        new AccessSite($this);
        new ChildOrderSite($this);

        //new SearchSite($this);

        //new FavoriteSite($this);
        //new AdminSite($this);

        //new ExplorerMobileSite($this);
        //new ViewSite($this);


        //new PublicShareEditSite($this);


        //new PrivateShareSite($this);
        //new PrintSite($this);


        new JsonExportSite($this);
        new JsonImportSite($this);


        //new ConfigSite($this);

        new ConfigSite($this);


    }


    public function loadContent()
    {


        $contentParameter = new ContentParameter();
        if ($contentParameter->exists()) {
            (new ExplorerPage())->render();
        } else {

            $contentId = (new HomeContentIdStore())->getValue();

            $site = clone(ExplorerSite::$site);
            $site->addParameter(new ContentParameter($contentId));
            $site->redirect();

        }


        //(new ExplorerPage())->render();


        // mobile redirect


        /*$site=clone(ItemSite::$site);
        $site->addParameter(new ContentParameter((new ExplorerContentType())->getContentId()));
        $site->redirect();*/


    }
}