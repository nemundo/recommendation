<?php


namespace Nemundo\Dev\Js;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Html\Document\HtmlDocument;

class JsPackageHeader extends AbstractBase
{

    /**
     * @var HtmlDocument
     */
    private $htmlDocument;

    public function __construct(HtmlDocument $htmlDocument)
    {
        $this->htmlDocument = $htmlDocument;
    }

    public function addJsPackage(AbstractJsPackage $jsPackage)
    {

        foreach ($jsPackage->getUrlList() as $url) {
            $this->htmlDocument->addJsUrl($url);
        }

    }

}