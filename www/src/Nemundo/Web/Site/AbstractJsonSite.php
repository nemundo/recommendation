<?php

namespace Nemundo\Web\Site;


use Nemundo\Core\Json\Document\JsonResponse;


// move to Json ???
abstract class AbstractJsonSite extends AbstractSite
{

    /**
     * @var JsonResponse
     */
    private $json;


    protected $jsonFilename;

    abstract protected function loadJson();

    public function __construct(AbstractSiteTree $site = null)
    {

        $this->menuActive = false;
        $this->title = 'Json';
        $this->url = 'json';
        parent::__construct($site);


        $this->json = new JsonResponse();


    }


    protected function loadSite()
    {

    }


    // protected
    public function addJsonRow($row) {
        $this->json->addRow($row);
    }


    protected function setJsonData($data) {
        $this->json->setData($data);
    }


    public function loadContent()
    {

        $this->loadJson();
        $this->json->filename = $this->jsonFilename;
        $this->json->render();

    }


}