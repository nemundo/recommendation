<?php

namespace Nemundo\Content\App\FileTransfer\Content\FileTransfer;

use Nemundo\Content\App\FileTransfer\Data\FileTransfer\FileTransferModel;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class FileTransferContentForm extends AbstractContentForm
{

    /**
     * @var FileTransferContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $fileTransfer;


    public function getContent()
    {

        $model = new FileTransferModel();

        $this->fileTransfer = new BootstrapTextBox($this);
        $this->fileTransfer->label = $model->fileTransfer->label;
        $this->fileTransfer->validation = true;

        return parent::getContent();
    }


    protected function loadUpdateForm()
    {

        $this->fileTransfer->value = $this->contentType->getDataRow()->fileTransfer;

    }

    public function onSubmit()
    {
        $this->contentType->fileTransfer = $this->fileTransfer->getValue();
        $this->contentType->saveType();
    }
}