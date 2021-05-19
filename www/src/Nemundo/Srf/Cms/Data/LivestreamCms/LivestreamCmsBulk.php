<?php
namespace Nemundo\Srf\Cms\Data\LivestreamCms;
class LivestreamCmsBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var LivestreamCmsModel
*/
protected $model;

/**
* @var string
*/
public $livestreamId;

public function __construct() {
parent::__construct();
$this->model = new LivestreamCmsModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->livestreamId, $this->livestreamId);
$id = parent::save();
return $id;
}
}