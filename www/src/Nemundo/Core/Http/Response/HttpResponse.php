<?php

namespace Nemundo\Core\Http\Response;


// WebResponse
class HttpResponse extends AbstractHttpResponse
{

    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $contentType = ContentType::HTML;

    /**
     * @var string
     */
    public $attachmentFilename;

    public $filesize;

}
