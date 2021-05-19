<?php

namespace Nemundo\Crawler\WebCrawler;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Core\Log\LogMessage;


class WebCrawlerRow extends AbstractBaseClass
{


    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }


    public function getCount()
    {
        $count = sizeof($this->data);
        return $count;
    }

    public function getValue($number)
    {

        $value = '';
        if (isset($this->data[$number])) {
            $value = trim($this->data[$number]);
        } else {
            (new LogMessage())->writeError('Crawler Number ' . $number . ' does not exist.');
        }

        return $value;

    }


}