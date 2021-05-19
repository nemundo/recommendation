<?php


namespace Nemundo\App\Manifest\Com\Link;


use Nemundo\Html\Header\Link\AbstractLink;
use Nemundo\Web\WebConfig;

class WebManifestLink extends AbstractLink
{

    public function getContent()
    {

        $this->rel = 'manifest';
        $this->href = WebConfig::$webUrl. 'manifest.webmanifest';

        return parent::getContent();

    }

}