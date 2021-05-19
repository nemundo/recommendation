<?php

namespace Nemundo\App\Mail\Site;


use Nemundo\App\Mail\Data\MailServer\MailServerDelete;
use Nemundo\App\Mail\Parameter\MailServerParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class MailServerDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var MailServerDeleteSite
     */
    public static $site;


    protected function loadSite()
    {

        $this->title = 'Delete Mail Server';
        $this->url = 'delete-mail-server';

        MailServerDeleteSite::$site = $this;
    }


    public function loadContent()
    {

        (new MailServerDelete())->deleteById((new MailServerParameter())->getValue());
        (new UrlReferer())->removeAllParameter()->redirect();

    }

}