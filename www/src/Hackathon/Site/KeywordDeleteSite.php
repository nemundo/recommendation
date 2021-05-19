<?php

namespace Hackathon\Site;

use Hackathon\Data\Keyword\KeywordDelete;
use Hackathon\Parameter\KeywordParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class KeywordDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var KeywordDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
//$this->title = 'DNew Topic';
        $this->url = 'delete-keyword';

        KeywordDeleteSite::$site=$this;

    }

    public function loadContent()
    {


        (new KeywordDelete())->deleteById((new KeywordParameter())->getValue());
        (new UrlReferer())->redirect();


    }
}