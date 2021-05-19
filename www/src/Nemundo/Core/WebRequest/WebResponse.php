<?php


namespace Nemundo\Core\WebRequest;


use Nemundo\Core\Base\AbstractBase;

class WebResponse extends AbstractBase
{

    // httpCode


    /**
     * @var int
     */
    public $statusCode;

    /**
     * @var string
     */
    public $html;

    /**
     * @var string
     */
    public $url;

    /**
     * @var string
     */
    public $errorMessage;

}