<?php

namespace Nemundo\Content\App\File\Content\Upload;

use Nemundo\Content\Type\AbstractContentType;


// FileUpload
class UploadContentType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'File Upload';
        $this->typeId = '1e872a9b-d03c-4c9f-b380-df6568aaf425';
        $this->formClassList[] = UploadContentForm::class;
        $this->formClassList[] = UrlUploadContentForm::class;
        $this->formClassList[] = UrlDownloadJobContentForm::class;

        $this->viewClassList[]= UploadContentView::class; // ContentView::class;

    }

}