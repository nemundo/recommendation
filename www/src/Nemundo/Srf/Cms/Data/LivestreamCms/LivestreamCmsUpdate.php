<?php
namespace Nemundo\Srf\Cms\Data\LivestreamCms;
use Nemundo\Model\Data\AbstractModelUpdate;
class LivestreamCmsUpdate extends AbstractModelUpdate {
/**
* @var LivestreamCmsModel
*/
public $model;

/**
* @var string
*/
public $livestreamId;

public function __construct() {
parent::__construct();
$this->model = new LivestreamCmsModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->livestreamId, $this->livestreamId);
parent::update();
}
}