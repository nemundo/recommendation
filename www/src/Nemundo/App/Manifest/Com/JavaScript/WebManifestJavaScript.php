<?php


namespace Nemundo\App\Manifest\Com\JavaScript;


use Nemundo\Html\Script\AbstractJavaScriptCode;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Html\Script\JavaScriptBody;
use Nemundo\Web\WebConfig;

class WebManifestJavaScript extends JavaScriptBody  // AbstractJavaScriptCode
{

    public function getContent()
    {

        $url = WebConfig::$webUrl . 'serviceworker.js';

        $this->addContent('if ("serviceWorker" in navigator) {');
        $this->addContent('navigator.serviceWorker.register("' . $url . '");');
        $this->addContent('}');

        return parent::getContent();

    }

}