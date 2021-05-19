<?php


namespace Nemundo\Content\App\File\Job;


use Nemundo\Content\App\File\Content\Upload\UploadFile;
use Nemundo\Content\App\File\Data\DownloadJob\DownloadJob;
use Nemundo\Content\App\File\Data\DownloadJob\DownloadJobReader;
use Nemundo\Content\App\File\Data\DownloadJob\DownloadJobRow;
use Nemundo\Content\App\Job\Content\AbstractJobContentType;

class UrlDownloadJob extends AbstractJobContentType
{

    public $url;

    protected function loadContentType()
    {

        $this->typeLabel = 'Url File Download Job';
        $this->typeId = 'ea4cea26-528a-4d5d-97ae-df42418816c6';

        $this->formClassList[] = UrlDownloadContentForm::class;

    }


    protected function onCreate()
    {

        $data = new DownloadJob();
        $data->url = $this->url;
        $data->done = false;
        $this->dataId = $data->save();

    }


    protected function onDataRow()
    {
        $this->dataRow = (new DownloadJobReader())->getRowById($this->dataId);
    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|DownloadJobRow
     */
    public function getDataRow()
    {
        return parent::getDataRow(); // TODO: Change the autogenerated stub
    }


    public function getSubject()
    {
        $subject = 'Download: ' . $this->getDataRow()->url;
        return $subject;
    }


    public function run()
    {


        //(new Debug())->write($this->getDataRow()->url);

        $upload = new UploadFile();
        //$upload->parentId = $this-> getParentId();
        $upload->file->fromUrl($this->getDataRow()->url);
        $upload->uploadFile();


    }

}