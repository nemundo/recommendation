<?php

namespace Nemundo\Core\Type\File;

use Nemundo\Core\File\FileInformation;
use Nemundo\Core\File\FileSize;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\AbstractType;

// Move to File
class File extends AbstractType
{

    /**
     * @var string
     */
    public $filename;

    /**
     * @var string
     */
    public $path;

    /**
     * @var string
     */
    public $fullFilename;
// filenameWithPath
// filenameWithDirectory

    public function changeValue($value)
    {

        parent::changeValue($value);

        if ($value !== null) {
            $this->filename = basename($value);
            $this->fullFilename = $value;
            $this->path = dirname($this->fullFilename) . DIRECTORY_SEPARATOR;
        }

    }


    /*
    private function fromFile($filename)
    {
        $this->filename = basename($filename);
        $this->fullFilename = $filename;
        //$this->fileContent = null;

        return $this;
    }


    private function fromUrl($url, $fileExtension = null)
    {

        // Leerstring im Url ersetzen
        $url = str_replace(' ', '%20', $url);

        $this->filename = basename($url);
        $this->fullFilename = $url;

        if ($fileExtension !== null) {
            $this->fullFilename = $this->fullFilename . '.' . $fileExtension;
        }

        $this->fileContent = @file_get_contents($url);

        $returnValue = true;
        if ($this->fileContent === false) {
            (new LogMessage())->writeError('Fehler beim Download. Url:' . $url);
            $returnValue = false;
        }

        //return $this;
        return $returnValue;
    }*/





    public function getFileSize()
    {

        $filesize = null;
        if ($this->fileExists()) {
            $filesize = filesize($this->fullFilename);
            $filesize = round($filesize / 1024, 0);
        }

        return $filesize;

    }


    public function getFileSizeText()
    {

        $filesize = new FileSize(filesize($this->fullFilename));
        return $filesize->getText();

    }


    public function getFileExtension()
    {

        $fileExtension = null;
        if ($this->fileExists()) {
            $fileExtension = (new FileInformation($this->filename))->getFileExtension();
        }

        return $fileExtension;

    }



    public function getFilenameWithoutFileExtension()
    {
        $filename = basename($this->filename, '.' . $this->getFileExtension());
        return $filename;
    }



    public function getFilenameWithoutExtension()
    {

        $fileTitle = $this->filename;

        // Datei Endung entfernen
        $fileTitle = substr($fileTitle, 0, strrpos($fileTitle, '.'));

        // Sonderzeichen ersetzen
        $fileTitle = str_replace('_', ' ', $fileTitle);
        $fileTitle = str_replace('-', ' ', $fileTitle);


        return $fileTitle;

    }


    public function getCreateDateTime()
    {

        //return DateTime

    }


    public function getModifyDateTime()
    {


    }


    public function getContent()
    {

        $content = file_get_contents($this->fullFilename);
        return $content;

    }


    // exists
    public function fileExists()
    {

        $returnValue = false;

        if ($this->isFile()) {
            if (file_exists($this->fullFilename)) {
                $returnValue = true;
            }
        }

        return $returnValue;

    }


    public function directoryExists()
    {

        $returnValue = false;

        if ($this->isDirectory()) {
            if (file_exists($this->fullFilename)) {
                $returnValue = true;
            }
        }

        return $returnValue;

    }


    public function notExists()
    {

        $value = !$this->fileExists();
        return $value;

    }


    public function isFile()
    {
        $value = is_file($this->fullFilename);
        return $value;
    }

    // isPath
    public function isDirectory()
    {
        $value = is_dir($this->fullFilename);
        return $value;
    }


    public function getPath()
    {
        $path = dirname($this->fullFilename) . DIRECTORY_SEPARATOR;
        return $path;
    }


    // saveFile
    public function saveAs($filename)
    {

        /*
         * soll beim Setup erstellt werden!
        $directory = new Directory();
        $directory->path = dirname($filename);
        $directory->createDirectory();
*/

        if ($this->fileExists()) {
            if (!@copy($this->fullFilename, $filename)) {
                $error = error_get_last();
                (new LogMessage())->writeError($error['type'] . $error['message']);
            }
        } else {
            (new LogMessage())->writeError('Datei ' . $this->fullFilename . ' existiert nicht.');
        }

    }


    public function renameFile($newFilename)
    {
        rename($this->fullFilename, $newFilename);

        //$this->filename=$newFilename;

        return $this;
    }


    public function deleteFile()
    {
        if ($this->fileExists()) {
            if (!@unlink($this->fullFilename)) {
                (new LogMessage())->writeError(error_get_last()['message'] . ' Filename:' . $this->fullFilename);
            }
        } else {
            (new LogMessage())->writeError('Delete File Error. File does not exist. Filename:' . $this->fullFilename);
        }
    }


    public function getHash()
    {

        $hash = null;
        if ($this->fileExists()) {
            $hash = md5_file($this->fullFilename);
        } else {
            (new LogMessage())->writeError('File does not exist');
        }
        return $hash;

    }


    public function isImage()
    {

        $value = true;
        if ($this->fileExists()) {
            if (exif_imagetype($this->fullFilename) == false) {
                $value = false;
            }
        } else {
            $value = false;
        }

        return $value;

    }

}