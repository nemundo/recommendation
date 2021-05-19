<?php

namespace Nemundo\Content\App\Camera\Content\Camera;

use Nemundo\Content\App\File\Type\ImageIndexTrait;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Core\Http\Request\File\FileRequest;
use Nemundo\Html\Form\Input\AcceptFileType;
use Nemundo\Html\Form\Input\FileInput;

class CameraContentForm extends AbstractContentForm
{

    /**
     * @var CameraContentType
     */
    public $contentType;

    /**
     * @var FileInput
     */
    private $file;

    private $requestName = 'cam_input';

    public function getContent()
    {

        $this->file = new FileInput($this);
        $this->file->accept = AcceptFileType::IMAGE;
        $this->file->capture = 'camera';
        $this->file->name = $this->requestName;

        return parent::getContent();
    }


    protected function onSubmit()
    {

        $this->contentType->image = new FileRequest($this->requestName);
        $this->contentType->saveType();

    }

}