<?php
namespace Nemundo\Content\App\File\Data\DownloadJob;
use Nemundo\Model\Data\AbstractModelUpdate;
class DownloadJobUpdate extends AbstractModelUpdate {
/**
* @var DownloadJobModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->done, $this->done);
parent::update();
}
}