<?php
namespace Nemundo\Content\App\Share\Data\PrivateShare;
class PrivateShareCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PrivateShareModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PrivateShareModel();
}
}