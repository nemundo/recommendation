<?php
namespace Nemundo\Content\App\Text\Data\Text;
class TextValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextModel();
}
}