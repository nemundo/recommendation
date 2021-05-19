<?php

namespace Nemundo\Content\App\Contact\Site;

use Nemundo\Content\App\Contact\Parameter\ContactParameter;
use Nemundo\Format\Vcard\VcardResponse;
use Nemundo\Web\Site\AbstractSite;

class BusinessCardSite extends AbstractSite
{

    /**
     * @var BusinessCardSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'BusinessCard';
        $this->url = 'BusinessCard';
        $this->menuActive = false;
        BusinessCardSite::$site = $this;

    }

    public function loadContent()
    {

        $contactRow = (new ContactParameter())->getContentType()->getDataRow();

        $response = new VcardResponse();
        $response->firstName = $contactRow->firstName;
        $response->lastName = $contactRow->lastName;
        $response->phone = $contactRow->phone;
        $response->email = $contactRow->email;
        $response->sendResponse();

    }

}