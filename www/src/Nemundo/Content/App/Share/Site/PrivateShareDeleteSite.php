<?php

namespace Nemundo\Content\App\Share\Site;

use Nemundo\Content\App\Explorer\Parameter\PrivateShareParameter;
use Nemundo\Content\App\Share\Data\PrivateShare\PrivateShareDelete;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class PrivateShareDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var PrivateShareDeleteSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Delete Private Share';
        $this->url = 'private-share-delete';

        PrivateShareDeleteSite::$site = $this;

    }

    public function loadContent()
    {

        (new PrivateShareDelete())->deleteById((new PrivateShareParameter())->getValue());
        (new UrlReferer())->redirect();

    }
}