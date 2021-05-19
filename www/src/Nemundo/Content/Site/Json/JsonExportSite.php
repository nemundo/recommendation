<?php


namespace Nemundo\Content\Site\Json;


use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Http\Response\ContentType;
use Nemundo\Core\Http\Response\HttpResponse;
use Nemundo\Web\Site\AbstractSite;

class JsonExportSite extends AbstractSite
{

    /**
     * @var JsonExportSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Json Export';
        $this->url = 'json-export';
        $this->menuActive = false;
        JsonExportSite::$site = $this;

    }


    public function loadContent()
    {

        $contentType = (new ContentParameter())->getContent(false);

        $response = new HttpResponse();
        $response->contentType = ContentType::JSON;
        $response->attachmentFilename = 'data.json';
        $response->content = $contentType->getJson();
        $response->sendResponse();


    }

}