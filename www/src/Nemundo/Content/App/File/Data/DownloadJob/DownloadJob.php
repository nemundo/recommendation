<?php
namespace Nemundo\Content\App\File\Data\DownloadJob;
class DownloadJob extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var DownloadJobModel
*/
protected $model;

/**
* @var string
*/
public $url;

/**
* @var bool
*/
public $done;

public function __construct() {
parent::__construct();
$this->model = new DownloadJobModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->done, $this->done);
$id = parent::save();
return $id;
}
}