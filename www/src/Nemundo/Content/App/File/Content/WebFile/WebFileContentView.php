<?php

namespace Nemundo\Content\App\File\Content\WebFile;

use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\File\FileInformation;
use Nemundo\Core\File\FileSize;
use Nemundo\Html\Player\AudioPlayer;
use Nemundo\Html\Player\VideoPlayer;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class WebFileContentView extends AbstractContentView
{
    /**
     * @var WebFileContentType
     */
    public $contentType;

    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='';
        $this->defaultView=true;

    }

    public function getContent()
    {

        $fileRow = $this->contentType->getDataRow();

        $hyperlink = new UrlHyperlink($this);
        $hyperlink->content = $fileRow->file->getFilename();
        $hyperlink->url = $fileRow->file->getUrl();

        $fileInformation = new FileInformation($fileRow->file->getFullFilename());


        /*
        $fileSize = new FileSize($fileRow->file->getFileSize());*/

        $table = new AdminLabelValueTable($this);

        /*if (!$fileRow->active) {
            $table->addLabelValue('Status', 'File is deleted');
        }*/


        //$table->addLabelValue('File Size', $fileRow->file->getFileSize());
        $table->addLabelValue('File Size', $fileInformation->getFileSize2()->getText());
        //$table->addLabelValue('Filename', $fileRow->file->getFullFilename());
        $table->addLabelValue('Filename Extension', $fileInformation->getFileExtension());




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