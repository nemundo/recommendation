<?php

namespace Nemundo\Core\Xml\Response;

class XmlResponse extends XmlDocument
{

    function __destruct()
    {

        $this->render();

        /*$response = new Web\Response();
        $response->contentType = Web\ContentType::XML;
        $response->content = $this->getXml();*/
        //$response->statusCode = 200;  // $this->responseCode;

    }


}