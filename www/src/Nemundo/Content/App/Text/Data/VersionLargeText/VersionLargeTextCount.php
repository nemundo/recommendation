<?php
namespace Nemundo\Content\App\Text\Data\VersionLargeText;
class VersionLargeTextCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var VersionLargeTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VersionLargeTextModel();
}
}