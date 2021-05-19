<?php

namespace Nemundo\Content\App\FileTransfer\Content\FileTransfer;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Content\App\File\Parameter\FileTransferParameter;
use Nemundo\Content\App\FileTransfer\Data\File\FileReader;
use Nemundo\Content\App\FileTransfer\Parameter\FileParameter;
use Nemundo\Content\App\FileTransfer\Site\FileDeleteSite;
use Nemundo\Content\App\FileTransfer\Site\FileTransferFileUploadSite;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Package\Dropzone\DropzoneUploadForm;

class FileTransferContentView extends AbstractContentView
{
    /**
     * @var FileTransferContentType
     */
    public $contentType;

    protected function loadView()
    {

        // view (only download)

        $this->viewId = '9a7ee402-2f97-45ee-ada5-0da70eafde95';
        $this->viewName = 'default';
        $this->defaultView = true;

    }


    public function getContent()
    {

        $fileTransferId = $this->contentType->getDataId();

        $dropzone = new DropzoneUploadForm($this);
        $dropzone->uploadSite = clone(FileTransferFileUploadSite::$site);
        $dropzone->uploadSite->addParameter(new FileTransferParameter($fileTransferId));


        $p = new Paragraph($this);
        $p->content = 'Nach Upload Browser aktualisieren, um die Files zu sehen.';


        $table = new AdminClickableTable($this);

        $header = new AdminTableHeader($table);
        $header->addText('File');
        $header->addEmpty();

        $reader = new FileReader();
        $reader->filter->andEqual($reader->model->fileTransferId, $fileTransferId);
        $reader->addOrder($reader->model->file->fileName);
        foreach ($reader->getData() as $fileRow) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($fileRow->file->getFilename());
            $row->addClickableUrl($fileRow->file->getUrl());

            $site = clone(FileDeleteSite::$site);
            $site->addParameter(new FileParameter($fileRow->id));
            $row->addIconSite($site);

        }

        return parent::getContent();

    }

}