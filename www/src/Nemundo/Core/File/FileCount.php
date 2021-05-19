<?php

namespace Nemundo\Core\File;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;

class FileCount extends AbstractBase
{


    public function getFolderCount($path)
    {

        $path = (new FileUtility())->appendDirectorySeparatorIfNotExists($path);
        $folderCount = 0;

        //(new Debug())->write($path);

        if ($handle = opendir($path)) {

            while (false !== ($entry = readdir($handle))) {

                //(new Debug())->write($entry);

                if ($entry != '.' && $entry != '..') {

                    $fullFilename = $path . $entry;

                    if (is_dir($fullFilename)) {
                        $folderCount++;

                    }
                }
            }

            closedir($handle);

        }

        return $folderCount;

    }


    public function getFileCount($path)
    {

        $count = 0;
        $path = (new FileUtility())->appendDirectorySeparatorIfNotExists($path);

        if (file_exists($path)) {

            if ($handle = opendir($path)) {

                while (false !== ($entry = readdir($handle))) {
                    if (($entry != '.') && ($entry != '..')) {

                        $fullFilename = $path . $entry;
                        if (is_dir($fullFilename)) {
                            $count = $count + $this->getFileCount($fullFilename);
                        }

                        if (is_file($fullFilename)) {
                            $count++;
                        }

                    }

                }

            }

            closedir($handle);

        }

        return $count;

    }

}