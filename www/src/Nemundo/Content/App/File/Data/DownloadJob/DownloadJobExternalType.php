<?php
namespace Nemundo\Content\App\File\Data\DownloadJob;
class DownloadJobExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = DownloadJobModel::class;
$this->externalTableName = "file_download_job";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->url = new \Nemundo\Model\Type\Text\TextType();
$this->url->fieldName = "url";
$this->url->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->url->externalTableName = $this->externalTableName;
$this->url->aliasFieldName = $this->url->tableName . "_" . $this->url->fieldName;
$this->url->label = "Url";
$this->addType($this->url);

$this->done = new \Nemundo\Model\Type\Number\YesNoType();
$this->done->fieldName = "done";
$this->done->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->done->externalTableName = $this->externalTableName;
$this->done->aliasFieldName = $this->done->tableName . "_" . $this->done->fieldName;
$this->done->label = "Done";
$this->addType($this->done);

}
}