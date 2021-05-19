<?php

namespace Nemundo\Geo\Kml\Document;


use Nemundo\Core\Http\Response\ContentType;
use Nemundo\Core\Http\Response\HttpResponse;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Geo\Kml\Container\Document;
use Nemundo\Geo\Kml\Property\Name;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractTagContainer;
use Nemundo\Html\Container\TagContainer;

// AbstractDocument
class KmlDocument extends AbstractTagContainer
{

    /**
     * @var string
     */
    public $filename = 'output.kml';

    /**
     * @var string
     */
    public $kmlTitle;


    /**
     * @var TagContainer
     */
    private $document;


    public function __construct()
    {
        parent::__construct(null);
    }


    protected function loadContainer()
    {

        $this->document = new Document();
        parent::loadContainer();

    }


    public function addContainer(AbstractContainer $container)
    {

        $this->document->addContainer($container);

    }


    public function getHtml()
    {

        $this->tagName = 'kml';
        $this->addAttribute('xmlns', 'http://www.opengis.net/kml/2.2');

        if ($this->kmlTitle !== null) {
            $name = new Name($this->document);
            $name->value = $this->kmlTitle;
        }

        parent::addContainer($this->document);

        $html = '<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL;
        $html .= $this->getBodyContent();

        return $html;

    }


    public function render()
    {

        $response = new HttpResponse();
        $response->content = $this->getHtml();
        $response->contentType = ContentType::KML;
        $response->attachmentFilename = $this->filename;
        $response->sendResponse();

    }


    public function saveFile($filename)
    {

        $file = new TextFileWriter($filename);
        $file->overwriteExistingFile = true;
        $file->addLine($this->getContent());
        $file->saveFile();

    }

}