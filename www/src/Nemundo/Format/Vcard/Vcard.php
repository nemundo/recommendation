<?php

namespace Nemundo\Format\Vcard;

use Nemundo\Core\Base\AbstractBase;


class Vcard extends AbstractBase
{

    use VcardTrait;

    public function getContent()
    {

        $data = [];
        $data[] = 'BEGIN:VCARD';
        $data[] = 'VERSION:4.0';
        $data[] = 'N;:' . utf8_decode($this->lastName) . ';' . utf8_decode($this->firstName);
        $data[] = 'FN:' . utf8_decode($this->lastName . ' ' . $this->firstName);
        $data[] = 'TEL;WORK;VOICE:' . $this->phone;
        $data[] = 'TEL;CELL;VOICE:' . $this->cellphone;
        $data[] = 'TEL;WORK;FAX:' . $this->fax;
        $data[] = 'EMAIL;PREF;INTERNET:' . $this->email;
        $data[] = 'URL;WORK:' . $this->url;

        if ($this->imageUrl !== null) {
            $imageContent = base64_encode(file_get_contents($this->imageUrl));
            $data[] = 'PHOTO;TYPE=JPEG;ENCODING=BASE64:' . $imageContent;
        }

        $data[] = 'END:VCARD';

        return implode("\n", $data);
        //return implode(PHP_EOL, $data);

    }

}
