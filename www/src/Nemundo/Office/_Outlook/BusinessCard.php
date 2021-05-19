<?php

namespace Nemundo\Office\Outlook;

/**
 * Erstellung einer vCard
 *
 * @package Nemundo\Outlook
 */


// Vcard
use Nemundo\Html\Document\HtmlDocument;

class BusinessCard
{

    // https://de.wikipedia.org/wiki/VCard

    /**
     * Dateiname der VCard. Dateiendung: .vcf
     * @var string
     */
    public $filename = 'vcard.vcf';

    public $name;

    public $vorname;

    public $comapny;

    public $phone;

    public $cellphone;

    public $fax;

    public $email;

    public $url;

    public $imageUrl;


    public function writeFile()
    {
        $file = fopen($this->filename, 'w');
        fwrite($file, $this->getContent());
        fclose($file);

    }


    public function sendToBrowser()
    {
        header('Content-type: text/vcard; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $this->filename . '"');
        http_response_code(200);
        echo $this->getContent();
    }


    private function getContent()
    {

        $data = array();

        $data[] = 'BEGIN:VCARD';
        $data[] = 'VERSION:4.0';

        // Speichern unter
        $data[] = 'N;:' . utf8_decode($this->name) . ';' . utf8_decode($this->vorname);

        // Name
        $data[] = 'FN:' . utf8_decode($this->name . ' ' . $this->vorname);

        // Phone
        $data[] = 'TEL;WORK;VOICE:' . $this->phone;

        // Cellphone
        $data[] = 'TEL;CELL;VOICE:' . $this->cellphone;

        // Fax
        $data[] = 'TEL;WORK;FAX:' . $this->fax;

        // eMail
        $data[] = 'EMAIL;PREF;INTERNET:' . $this->email;

        // Url
        $data[] = 'URL;WORK:' . $this->url;

        // Image
        if ($this->imageUrl !== null) {
            $imageContent = base64_encode(file_get_contents($this->imageUrl));
            $data[] = 'PHOTO;TYPE=JPEG;ENCODING=BASE64:' . $imageContent;
        }

        $data[] = 'END:VCARD';

        return implode("\n", $data);
        //return implode(PHP_EOL, $data);

    }

}
