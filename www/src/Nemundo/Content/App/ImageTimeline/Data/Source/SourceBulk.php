<?php
namespace Nemundo\Content\App\ImageTimeline\Data\Source;
class SourceBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var SourceModel
*/
protected $model;

/**
* @var string
*/
public $source;

/**
* @var string
*/
public $url;

public function __construct() {
parent::__construct();
$this->model = new SourceModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->source, $this->source);
$this->typeValueList->setModelValue($this->model->url, $this->url);
$id = parent::save();
return $id;
}
}