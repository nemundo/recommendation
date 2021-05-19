<?php
namespace Nemundo\Srf\Cms\Data\LivestreamCms;
class LivestreamCmsValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var LivestreamCmsModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LivestreamCmsModel();
}
}