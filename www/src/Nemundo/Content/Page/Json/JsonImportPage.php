<?php

namespace Nemundo\Content\Page\Json;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Com\Form\JsonImportForm;

class JsonImportPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $form = new JsonImportForm($this);


        return parent::getContent();
    }
}