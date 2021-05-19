<?php
namespace Nemundo\Content\App\ImageTimeline\Data\Source;
use Nemundo\Model\Data\AbstractModelUpdate;
class SourceUpdate extends AbstractModelUpdate {
/**
* @var SourceModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->source, $this->source);
$this->typeValueList->setModelValue($this->model->url, $this->url);
parent::update();
}
}