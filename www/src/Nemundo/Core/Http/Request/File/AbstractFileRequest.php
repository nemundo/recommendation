<?php

namespace Nemundo\Core\Http\Request\File;


use Nemundo\Core\File\FileInformation;
use Nemundo\Core\File\FileUtility;
use Nemundo\Core\File\UniqueFilename;
use Nemundo\Core\Http\Request\AbstractRequest;
use Nemundo\Core\Log\LogMessage;


abstract class AbstractFileRequest extends AbstractRequest
{

    /**
     * @var string
     */
    public $filename;

    /**
     * @var string
     */
    public $filenameExtension;

    /**
     * @var string
     */
    public $fileSize;

    /**
     * @var string
     */
    public $tmpFileName;

    /**
     * @var string
     */
    public $errorCode;


    public function __construct()
    {

        parent::__construct();

        if (isset($_FILES[$this->requestName])) {

            // das wird ja gar nie ausgeführt!!!

            $this->filename = $_FILES[$this->requestName]['name'];
            $this->tmpFileName = $_FILES[$this->requestName]['tmp_name'];
            $this->fileSize = $_FILES[$this->requestName]['size'];
            $this->errorCode = $_FILES[$this->requestName]['error'];

            $file = new FileInformation($this->filename);
            $this->filenameExtension = $file->getFileExtension();

        }

    }


    public function saveFile($filename)
    {

        if ($this->isDownloadSuccesful()) {
            if (!move_uploaded_file($this->tmpFileName, $filename)) {
                (new LogMessage())->writeError('move_uploaded_file Error. From: ' . $this->tmpFileName . ' to ' . $filename);
            }
        }

    }


    public function saveAsUniqueFilename($path)
    {

        $path = (new FileUtility())->appendDirectorySeparatorIfNotExists($path);

        $filename = (new UniqueFilename())->getUniqueFilename($this->filenameExtension);

        $fullFilename = $path . $filename;
        $this->saveFile($fullFilename);
        return $fullFilename;

    }


    public function saveAsOrginalFilename($path)
    {

        $path = (new FileUtility())->appendDirectorySeparatorIfNotExists($path);
        $fullFilename = $path . $this->filename;
        $this->saveFile($fullFilename);

        return $fullFilename;

    }


    public function isDownloadSuccesful()
    {

        if ($this->errorCode == 0) {
            return true;
        } else {
            return false;
        }

    }


    public function hasValue()
    {

        $value = false;
        if ($this->errorCode == 0) {
            $value = true;
        }

        return $value;

    }


    public function hasError()
    {

        if ($this->errorCode !== 0) {
            return true;
        } else {
            return false;
        }

    }


    public function getErrorMessage()
    {

        switch ($this->errorCode) {
            case UPLOAD_ERR_INI_SIZE:
                $message = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $message = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
                break;
            case UPLOAD_ERR_PARTIAL:
                $message = 'The uploaded file was only partially uploaded';
                break;
            case UPLOAD_ERR_NO_FILE:
                $message = 'No file was uploaded';
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $message = 'Missing a temporary folder';
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $message = 'Failed to write file to disk';
                break;
            case UPLOAD_ERR_EXTENSION:
                $message = 'File upload stopped by extension';
                break;

            default:
                $message = 'Unknown upload error';
                break;
        }

        return $message;

    }

}