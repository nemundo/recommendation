<?php


namespace Nemundo\Content\App\Explorer\Site;


use Nemundo\Content\App\Explorer\Parameter\RefererContentParameter;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class ContentDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var ContentDeleteSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Delete';
        $this->url = 'delete-content';

        ContentDeleteSite::$site = $this;

    }


    public function loadContent()
    {


        (new ContentParameter())->getContent(false)->deleteType();

        $site = clone(ExplorerSite::$site);  // clone(ItemSite::$site);
        $site->addParameter((new ContentParameter((new RefererContentParameter())->getValue())));
        $site->redirect();

    }

}