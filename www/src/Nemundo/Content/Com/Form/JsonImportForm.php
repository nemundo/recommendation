<?php


namespace Nemundo\Content\Com\Form;


use Nemundo\Content\Json\JsonContentImport;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;

class JsonImportForm extends BootstrapForm
{

    /**
     * @var BootstrapFileUpload
     */
    private $upload;

    public function getContent()
    {

        $this->upload = new BootstrapFileUpload($this);
        $this->upload->label = 'File';
        $this->upload->acceptFileType = '.json';
        $this->upload->multiUpload=true;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        foreach ($this->upload->getMultiFileRequest() as $fileRequest) {
            (new JsonContentImport())->importJson($fileRequest->tmpFileName);
        }

        //exit;

    }

}