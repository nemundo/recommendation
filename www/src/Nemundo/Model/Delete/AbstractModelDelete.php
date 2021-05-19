<?php

namespace Nemundo\Model\Delete;


use Nemundo\Core\Type\File\File;
use Nemundo\Db\Delete\AbstractDataDelete;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Reader\FieldAddTrait;
use Nemundo\Model\Reader\ModelDataReader;
use Nemundo\Model\Reader\Property\File\FileReaderProperty;
use Nemundo\Model\Reader\Property\File\ImageReaderProperty;
use Nemundo\Model\Reader\Property\File\RedirectFilenameReaderProperty;
use Nemundo\Model\Type\File\FileType;
use Nemundo\Model\Type\File\ImageType;
use Nemundo\Model\Type\File\RedirectFilenameType;


abstract class AbstractModelDelete extends AbstractDataDelete
{

    use FieldAddTrait;

    /**
     * @var AbstractModel
     */
    public $model;

    /**
     * @var bool
     */
    public $deleteFile = true;


    public function delete()
    {

        if ($this->deleteFile) {

            $fileTypeFound = false;
            foreach ($this->model->getTypeList() as $type) {
                if ($type->isObjectOfClass(FileType::class)) {
                    $fileTypeFound = true;
                }

                if ($type->isObjectOfClass(RedirectFilenameType::class)) {
                    $fileTypeFound = true;
                }

            }

            if ($fileTypeFound) {

                $reader = new ModelDataReader();
                $reader->connection = $this->connection;
                $reader->model = $this->model;
                $reader->filter = $this->filter;
                $reader->addFieldByModel($this->model);

                foreach ($reader->getData() as $row) {

                    foreach ($this->model->getTypeList() as $type) {

                        if ($type->isObjectOfClass(FileType::class)) {
                            $readerProperty = new FileReaderProperty($row, $type);
                            $file = $readerProperty->getFile();

                            if ($file->fileExists()) {
                                $file->deleteFile();
                            }
                        }

                        if ($type->isObjectOfClass(ImageType::class)) {

                            foreach ($type->getFormatList() as $format) {

                                $property = new ImageReaderProperty($row, $type);

                                $file = new File($property->getImageFullFilename($format));
                                if ($file->fileExists()) {
                                    $file->deleteFile();
                                }

                            }
                        }


                        if ($type->isObjectOfClass(RedirectFilenameType::class)) {

                            $readerProperty = new RedirectFilenameReaderProperty($row, $type);
                            $file = $readerProperty->getFile();

                            if ($file->fileExists()) {
                                $file->deleteFile();
                            }

                        }

                    }

                }

            }

        }

        $this->tableName = $this->model->tableName;

        $this->checkExternal($this->model, false);


        parent::delete();

    }


    public function deleteById($id)
    {
        $this->filter->andEqual($this->model->id, $id);
        $this->delete();
    }

}