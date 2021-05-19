<?php
namespace Nemundo\Content\App\Text\Data\VersionLargeText;
class VersionLargeTextValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var VersionLargeTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VersionLargeTextModel();
}
}