<?php
namespace Nemundo\Srf\Cms\Data\LivestreamCms;
use Nemundo\Model\Id\AbstractModelIdValue;
class LivestreamCmsId extends AbstractModelIdValue {
/**
* @var LivestreamCmsModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LivestreamCmsModel();
}
}