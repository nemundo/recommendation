<?php

namespace Nemundo\Core\File;

use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Core\Type\File\File;


// FileReader ????
class DirectoryReader extends AbstractDataSource
{

    /**
     * @var bool
     */
    public $includeFiles = true;

    /**
     * @var bool
     */
    public $includeDirectories = false;

    /**
     * @var string
     */
    public $path;

    /**
     * @var bool
     */
    public $recursiveSearch = false;


    //public $filetypeFilter;

    /**
     * @var string[]
     */
    private $fileExtensionFilter = [];


    public function addFileExtensionFilter($fileExtension)
    {

        $this->fileExtensionFilter[] = $fileExtension;
        return $this;

    }


    protected function loadData()
    {



        $item = [];

        if (!$this->checkProperty('path')) {
            return $item;
        }

        /*
        if (is_array($this->path)) {
            foreach ($this->path as $path) {
                $item = array_merge($item, $this->getFileListInternal($path));
            }
        } else {
            $item = $this->getFileListInternal($this->path);
        }*/

        $item = $this->getFileListInternal($this->path);

        $this->list = $item;

    }


    /**
     * @return File[]
     */
    public function getData()
    {
        return parent::getData();
    }


    private function getFileListInternal($path)
    {

        $path = (new FileUtility())->appendDirectorySeparatorIfNotExists($path);

        $item = array();

        if (file_exists($path)) {

            if ($handle = opendir($path)) {

                while (false !== ($entry = readdir($handle))) {
                    if (($entry != '.') && ($entry != '..')) {

                        // Pfad anfügen
                        $filename = $entry;
                        $fullFilename = $path . $entry;

                        if ($this->includeDirectories) {
                            if (is_dir($fullFilename)) {
                                $fileItem = new File($fullFilename);
                                $item[] = $fileItem;
                            }
                        }

                        if ($this->includeFiles) {
                            if (is_file($fullFilename)) {
                                $fileItem = new File($fullFilename);

                                $addItem = true;
                                if (sizeof($this->fileExtensionFilter) > 0) {
                                    $addItem = false;
                                    foreach ($this->fileExtensionFilter as $fileExtension) {
                                        if ($fileItem->getFileExtension() == $fileExtension) {
                                            $addItem = true;
                                        }
                                    }
                                }

                                if ($addItem) {
                                    $item[] = $fileItem;
                                }

                            }
                        }

                        if ($this->recursiveSearch) {
                            if (is_dir($fullFilename)) {
                                $itemRecursiv = $this->getFileListInternal($fullFilename);
                                $item = array_merge($item, $itemRecursiv);
                            }
                        }
                    }
                }
                closedir($handle);
            }
        } else {
            (new LogMessage())->writeError('Directory ' . $path . ' does not exist.');
        }
        return $item;
    }

}
