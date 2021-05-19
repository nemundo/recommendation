<?php
namespace Nemundo\Content\App\File\Data\DownloadJob;
class DownloadJobModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $url;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $done;

protected function loadModel() {
$this->tableName = "file_download_job";
$this->aliasTableName = "file_download_job";
$this->label = "Download Job";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "file_download_job";
$this->id->externalTableName = "file_download_job";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "file_download_job_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->url = new \Nemundo\Model\Type\Text\TextType($this);
$this->url->tableName = "file_download_job";
$this->url->externalTableName = "file_download_job";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "file_download_job_url";
$this->url->label = "Url";
$this->url->allowNullValue = true;
$this->url->length = 255;

$this->done = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->done->tableName = "file_download_job";
$this->done->externalTableName = "file_download_job";
$this->done->fieldName = "done";
$this->done->aliasFieldName = "file_download_job_done";
$this->done->label = "Done";
$this->done->allowNullValue = true;

}
}