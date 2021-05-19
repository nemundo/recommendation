<?php

namespace Nemundo\Format\Vcard;


use Nemundo\Core\Http\Response\ContentType;
use Nemundo\Core\Http\Response\HttpResponse;

class VcardResponse extends HttpResponse
{

    use VcardTrait;

    public function sendResponse()
    {

        $vcard = new Vcard();
        $vcard->lastName = $this->lastName;
        $vcard->firstName = $this->firstName;
        $vcard->lastName = $this->lastName;
        $vcard->firstName = $this->firstName;
        $vcard->street = $this->street;
        $vcard->city = $this->city;
        $vcard->phone = $this->phone;
        $vcard->cellphone = $this->cellphone;
        $vcard->email = $this->email;
        $vcard->url = $this->url;

        $this->content = $vcard->getContent();
        $this->attachmentFilename = $this->firstName . ' ' . $this->lastName . '.vcf';
        $this->contentType = ContentType::CALENDAR;

        parent::sendResponse();

    }

}