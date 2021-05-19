<?php
namespace Nemundo\Content\App\Translation\Data\TextTranslation;
class TextTranslationValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TextTranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextTranslationModel();
}
}