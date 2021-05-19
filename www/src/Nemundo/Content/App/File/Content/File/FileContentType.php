<?php

namespace Nemundo\Content\App\File\Content\File;

use Nemundo\Content\App\File\Data\File\File;
use Nemundo\Content\App\File\Data\File\FileReader;
use Nemundo\Content\App\File\Data\File\FileRow;
use Nemundo\Content\App\File\Type\FileIndexTrait;
use Nemundo\Content\Type\JsonContentTrait;
use Nemundo\Core\File\Base64File;
use Nemundo\Project\Path\TmpPath;


class FileContentType extends AbstractFileContentType
{

    //use FileIndexTrait;
    //use JsonContentTrait;

    protected function loadContentType()
    {

        $this->typeLabel = 'File';
        $this->typeId = 'ada4190d-a0c3-4470-9afd-aa9ab11a2e6b';

        $this->formClassList[] = FileContentForm::class;
        $this->formClassList[] = UrlFileContentForm::class;
        $this->formClassList[] = FileContentSearchForm::class;

        $this->viewClassList[] = FileContentView::class;
        $this->viewClassList[] = DownloadButtonView::class;

    }


    protected function onCreate()
    {

        $data = new File();
        $data->file->fromFileProperty($this->file);
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {
    }


    protected function onIndex()
    {

        //$this->saveFileIndex();

    }


    protected function onDataRow()
    {
        $this->dataRow = (new FileReader())->getRowById($this->dataId);
    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|FileRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {

        return $this->getDataRow()->file->getFilename();

    }


    public function getData()
    {

        $data = [];
        $data['filename'] = $this->getDataRow()->file->getFilename();
        $data['base64'] = (new Base64File($this->getDataRow()->file->getFullFilename()))->getBase64();

        return $data;

    }


    public function importJson($data)
    {

        $filename = (new TmpPath())
            ->addPath('import')
            ->createPath()
            ->addPath($data['filename'])
            ->getFullFilename();

        (new Base64File($filename))->saveFile($data['base64']);

        $this->file->fromFilename($filename);
        $this->saveType();

        (new \Nemundo\Core\Type\File\File($filename))->deleteFile();


    }

}