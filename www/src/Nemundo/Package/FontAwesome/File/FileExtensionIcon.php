<?php


namespace Nemundo\Package\FontAwesome\File;


use Nemundo\Core\File\FileInformation;
use Nemundo\Package\FontAwesome\AbstractFontAwesomeIcon;

class FileExtensionIcon extends AbstractFontAwesomeIcon
{

    public $filename;


    public function getContent()
    {

        $fileInformation=new FileInformation($this->filename);

        $icon = 'file';

        if ($fileInformation->isPdf()) {
            $icon = 'file-pdf';
        }

        if ($fileInformation->isImage()) {
            $icon = 'file-image';
        }

        if ($fileInformation->isAudio()) {
            $icon = 'file-audio';
        }

        if ($fileInformation->isVideo()) {
            $icon = 'file-video';
        }

        $this->icon = $icon;
        $this->solid = true;
        $this->iconSize = 3;

        return parent::getContent();

    }

}