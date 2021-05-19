<?php

namespace Hackathon\Site;

use Hackathon\Data\Keyword\KeywordDelete;
use Hackathon\Data\Topic\TopicDelete;
use Hackathon\Parameter\KeywordParameter;
use Hackathon\Parameter\TopicParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class TopicDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var TopicDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
//$this->title = 'DNew Topic';
        $this->url = 'delete-topic';

        TopicDeleteSite::$site=$this;

    }

    public function loadContent()
    {


        (new TopicDelete())->deleteById((new TopicParameter())->getValue());
        (new UrlReferer())->redirect();


    }
}