<?php

namespace Nemundo\Html\Document;

use Nemundo\Core\Http\Response\ContentType;
use Nemundo\Core\Http\Response\HttpResponse;


abstract class AbstractHtmlDocument extends AbstractDocument
{

    /**
     * @var Html
     */
    protected $html;

    /**
     * @var Head
     */
    protected $head;

    /**
     * @var
     */
    protected $body;

    public function __construct()
    {
        parent::__construct();

        $this->html = new Html();
        $this->head = new Head($this->html);
        $this->body = new Body($this->html);

    }


    public function getHtml()
    {

        $htmlItem = $this->getContent();

        $this->head->addContent($htmlItem->headerContent);
        $this->body->addContent(PHP_EOL . $htmlItem->bodyContent);

        $html = '<!DOCTYPE html>' . PHP_EOL . $this->html->getBodyContent();

        return $html;

    }


    public function render()
    {

        $response = new HttpResponse();
        $response->content = $this->getHtml();
        $response->statusCode = $this->statusCode;
        $response->contentType = ContentType::HTML;
        $response->sendResponse();

    }

}
