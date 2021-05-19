<?php
namespace Nemundo\Srf\Cms\Data\LivestreamCms;
class LivestreamCmsDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var LivestreamCmsModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LivestreamCmsModel();
}
}