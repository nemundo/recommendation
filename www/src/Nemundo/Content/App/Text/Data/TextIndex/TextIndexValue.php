<?php
namespace Nemundo\Content\App\Text\Data\TextIndex;
class TextIndexValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TextIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextIndexModel();
}
}