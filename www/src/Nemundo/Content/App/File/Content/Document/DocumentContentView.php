<?php

namespace Nemundo\Content\App\File\Content\Document;

use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\File\FileSize;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Html\Block\ContentDiv;
use Nemundo\Html\Block\Div;

class DocumentContentView extends AbstractContentView
{

    /**
     * @var DocumentContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='ca3cdc72-0909-4d56-81a0-6ffafe4236b7';
        $this->defaultView=true;

    }


    public function getContent()
    {

        $documentRow = $this->contentType->getDataRow();

        $hyperlink = new UrlHyperlink($this);
        $hyperlink->content = $documentRow->document->getFilename();
        $hyperlink->url = $documentRow->document->getUrl();

        $fileSize = new FileSize($documentRow->document->getFileSize());

        $table = new AdminLabelValueTable($this);

        /*if (!$fileRow->active) {
            $table->addLabelValue('Status', 'File is deleted');
        }*/

        //$table->addLabelValue('File Size', $fileRow->file->getFileSize());
        $table->addLabelValue('File Size', $fileSize->getText());
        //$table->addLabelValue('Filename', $fileRow->file->getFullFilename());
        $table->addLabelValue('Filename Extension', $documentRow->document->getFileExtension());

        /*$fileInformation = new FileInformation($fileRow->file->getFullFilename());

        if ($fileInformation->isImage()) {
            $img = new BootstrapResponsiveImage($this);
            $img->src = $fileRow->file->getUrl();
            $img->width = 1200;
        }

        if ($fileInformation->isAudio()) {
            $player=new Audio($this);
            $player->src= $fileRow->file->getUrl();
        }

        if ($fileInformation->isVideo()) {
            $player=new Video($this);
            $player->src= $fileRow->file->getUrl();
            $player->width = '100%';
        }*/


        $div = new ContentDiv($this);
        $div->content = (new Html($documentRow->text))->getValue();


        return parent::getContent();
    }
}