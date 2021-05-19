<?php


namespace Nemundo\Content\App\Explorer\Com\Form;


use Nemundo\Content\App\Explorer\Setup\ExplorerSetup;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;

class ConfigContentTypeForm extends BootstrapForm
{

    /**
     * @var ContentTypeListBox
     */
    private $contentType;

    public function getContent()
    {

        //$this->contentType=new ContentTypeListBox($this);
        $this->contentType = new BootstrapListBox($this);
        $this->contentType->label = 'Content Type';

        $reader = new ContentTypeReader();
        $reader->addOrder($reader->model->contentType);
        foreach ($reader->getData() as $contentTypeRow) {

            $type = $contentTypeRow->getContentType();
            if ($type->hasForm()) {
                $this->contentType->addItem($contentTypeRow->id, $contentTypeRow->contentType);
            }

        }

        return parent::getContent();

    }


    protected function onSubmit()
    {


        (new ExplorerSetup())->addContentTypeId($this->contentType->getValue());


    }


}