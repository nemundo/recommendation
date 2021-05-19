<?php

namespace Nemundo\Com\FormBuilder\Item;

use Nemundo\Com\ComConfig;
use Nemundo\Core\Http\Request\File\FileRequest;
use Nemundo\Core\Http\Request\File\MultiFileRequest;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Validation\ValidationType;
use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Html\Form\Input\FileInput;


abstract class AbstractFileUpload extends AbstractFormBuilderItem
{

    /**
     * @var bool
     */
    public $multiUpload = false;

    /**
     * @var AcceptFileType
     */
    public $acceptFileType;

    /**
     * @var FileInput
     */
    protected $fileInput;


    public function __construct($parentContainer = null)
    {
        parent::__construct($parentContainer);
        $this->fileInput = new FileInput();
        $this->validationType = ValidationType::IS_FILE;
    }


    protected function prepareHtml()
    {
        $this->fileInput->name = $this->name;
        $this->fileInput->multiple = $this->multiUpload;
        $this->fileInput->accept = $this->acceptFileType;
    }


    public function checkValue()
    {

        $this->prepareHtml();
        $returnValue = true;

        if ($this->validation) {

            if (!$this->hasValue()) {
                $this->showErrorMessage = true;

                if ($this->errorMessage === null) {
                    $this->errorMessage = ComConfig::$errorMessageFile;
                }

                $returnValue = false;

            }

        }

        return $returnValue;

    }


    public function hasValue()
    {

        $value = false;
        if ($this->multiUpload) {
            $fileRequest = $this->getMultiFileRequest();
            if (sizeof($fileRequest) > 0) {
                $value = true;
            }
        } else {
            $fileRequest = $this->getFileRequest();
            $value = $fileRequest->hasValue();
        }
        return $value;

    }


    public function getValue()
    {
        (new LogMessage())->writeError('Invalid Function: getValue()');
    }

    /**
     * @return FileRequest
     */
    public function getFileRequest()
    {

        if ($this->multiUpload) {
            (new LogMessage())->writeError('Function getFileRequest is not allowed to call if Multi Upload is active.');
            return null;
        }

        $fileRequest = new FileRequest($this->name);

        return $fileRequest;

    }


    // getFileRequestList

    /**
     * @return FileRequest[]
     */
    public function getMultiFileRequest()
    {

        if (!$this->multiUpload) {
            (new LogMessage())->writeError('Function getMultiFileRequest is not allowed to call if Multi Upload is not active.');
            return null;
        }

        $fileRequestList = new MultiFileRequest($this->name);
        return $fileRequestList->getFileRequestList();

    }

}