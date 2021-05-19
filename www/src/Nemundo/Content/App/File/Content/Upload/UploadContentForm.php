<?php

namespace Nemundo\Content\App\File\Content\Upload;

use Nemundo\Content\App\File\Site\FileUploadSite;
use Nemundo\Content\Form\AbstractContentContainer;
use Nemundo\Package\Dropzone\DropzoneUploadForm;

class UploadContentForm extends AbstractContentContainer
{
    /**
     * @var UploadContentType
     */
    public $contentType;

    public $formName = 'Upload';

    public function getContent()
    {

        $dropzone = new DropzoneUploadForm($this);
        $dropzone->saveSite = clone(FileUploadSite::$site);
        //$dropzone->saveSite->addParameter(new ParentParameter($this->contentType->getParentId()));

        return parent::getContent();

    }

}