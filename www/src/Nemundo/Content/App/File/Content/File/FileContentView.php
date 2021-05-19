<?php

namespace Nemundo\Content\App\File\Content\File;

use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\File\FileInformation;
use Nemundo\Core\File\FileSize;
use Nemundo\Html\Player\AudioPlayer;
use Nemundo\Html\Player\VideoPlayer;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class FileContentView extends AbstractContentView
{
    /**
     * @var FileContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='7bdcfaa0-efa4-4ac6-b5f1-60f87c43228c';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $fileRow = $this->contentType->getDataRow();

        $hyperlink = new UrlHyperlink($this);
        $hyperlink->content = $fileRow->file->getFilename();
        $hyperlink->url = $fileRow->file->getUrl();

        $fileSize = new FileSize($fileRow->file->getFileSize());

        $table = new AdminLabelValueTable($this);

        /*if (!$fileRow->active) {
            $table->addLabelValue('Status', 'File is deleted');
        }*/

        //$table->addLabelValue('File Size', $fileRow->file->getFileSize());
        $table->addLabelValue('File Size', $fileSize->getText());
        //$table->addLabelValue('Filename', $fileRow->file->getFullFilename());
        $table->addLabelValue('Filename Extension', $fileRow->file->getFileExtension());

        $fileInformation = new FileInformation($fileRow->file->getFullFilename());

        if ($fileInformation->isImage()) {
            $img = new BootstrapResponsiveImage($this);
            $img->src = $fileRow->file->getUrl();
            $img->width = 1200;
        }

        if ($fileInformation->isAudio()) {
            $player = new AudioPlayer($this);
            $player->src = $fileRow->file->getUrl();
        }

        if ($fileInformation->isVideo()) {
            $player = new VideoPlayer($this);
            $player->src = $fileRow->file->getUrl();
            $player->width = '100%';
        }


        //$div = new Div($this);
        //$div->content = (new Html($fileRow->text))->getValue();


        return parent::getContent();
    }
}