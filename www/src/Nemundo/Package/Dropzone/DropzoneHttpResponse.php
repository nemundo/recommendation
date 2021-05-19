<?php


namespace Nemundo\Package\Dropzone;


use Nemundo\Core\Http\Response\AbstractHttpResponse;
use Nemundo\Core\Http\Response\ContentType;

class DropzoneHttpResponse extends AbstractHttpResponse
{

    public function sendResponse()
    {

        $data['success'] = '';
        $this->contentType = ContentType::JSON;
        $this->content = json_encode($data);

        parent::sendResponse();

    }

}