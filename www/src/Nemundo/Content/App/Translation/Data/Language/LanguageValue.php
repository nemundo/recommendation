<?php
namespace Nemundo\Content\App\Translation\Data\Language;
class LanguageValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var LanguageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LanguageModel();
}
}