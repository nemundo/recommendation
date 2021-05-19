<?php

namespace Nemundo\Content\App\PublicShare\Site;


use Nemundo\Content\App\PublicShare\Data\PublicShare\PublicShareDelete;
use Nemundo\Content\App\PublicShare\Parameter\PublicShareParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class PublicShareDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var PublicShareDeleteSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Delete Public Share';
        $this->url = 'public-share-delete';
        PublicShareDeleteSite::$site = $this;

    }


    public function loadContent()
    {

        $publicShareId = (new PublicShareParameter())->getValue();
        (new PublicShareDelete())->deleteById($publicShareId);

        (new UrlReferer())->redirect();

    }

}