<?php
namespace Nemundo\Srf\Cms\Data\LivestreamCms;
class LivestreamCmsCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var LivestreamCmsModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LivestreamCmsModel();
}
}