<?php

namespace Nemundo\App\Manifest\Page;

use Nemundo\App\Manifest\Com\Code\WebManifestCode;
use Nemundo\App\Manifest\Com\Form\ManifestBuilderForm;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class ManifestPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);

        new ManifestBuilderForm($layout->col1);

        new WebManifestCode($layout->col2);







        return parent::getContent();
    }
}