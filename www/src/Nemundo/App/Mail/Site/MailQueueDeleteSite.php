<?php

namespace Nemundo\App\Mail\Site;


use Nemundo\App\Mail\Data\MailQueue\MailQueueDelete;
use Nemundo\App\Mail\Parameter\MailParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class MailQueueDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var MailQueueDeleteSite
     */
    public static $site;


    protected function loadSite()
    {

        $this->title = 'Delete Mail';
        $this->url='delete-mail';

        MailQueueDeleteSite::$site = $this;
    }


    public function loadContent()
    {

        (new MailQueueDelete())->deleteById((new MailParameter())->getValue());
        (new UrlReferer())->removeAllParameter()->redirect();

    }

}