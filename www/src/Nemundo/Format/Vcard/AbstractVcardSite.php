<?php

namespace Nemundo\Format\Vcard;


use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Web\Site\AbstractSiteTree;

abstract class AbstractVcardSite extends AbstractIconSite
{

    use VcardTrait;

    public function __construct(AbstractSiteTree $site = null)
    {
        $this->title = 'Vcard';
        $this->url = 'vcard';

        //$this->icon = new FontAwesomeIcon();
        //$this->icon->icon = 'save';

        parent::__construct($site);

        $this->icon->icon = 'save';

    }


    public function loadContent()
    {

        $response = new VcardResponse();
        $response->lastName = $this->lastName;
        $response->firstName = $this->firstName;
        $response->street = $this->street;
        $response->city = $this->city;
        $response->phone = $this->phone;
        $response->cellphone = $this->cellphone;
        $response->email = $this->email;
        $response->url = $this->url;

        $response->sendResponse();

    }

}