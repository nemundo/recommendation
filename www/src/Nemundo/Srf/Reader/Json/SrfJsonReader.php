<?php

namespace Nemundo\Srf\Reader\Json;


use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Core\WebRequest\CurlWebRequest;
use Nemundo\Srf\Token\SrfToken;

class SrfJsonReader extends AbstractDataSource
{

    /**
     * @var string
     */
    public $url;

    protected function loadData()
    {

        $accessToken = (new SrfToken())->getToken();

        $web = new CurlWebRequest();
        $web->addHeader('accept: application/json');
        $web->addHeader('Authorization: Bearer ' . $accessToken);
        $response = $web->getUrl($this->url);

        //(new Debug())->write($response->html);

        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);
        $this->addItem($jsonReader->getData());

    }

}