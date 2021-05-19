<?php
namespace Nemundo\Content\App\Text\Data\VersionText;
class VersionTextValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var VersionTextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new VersionTextModel();
}
}