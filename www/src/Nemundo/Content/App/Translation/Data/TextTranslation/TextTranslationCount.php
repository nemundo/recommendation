<?php
namespace Nemundo\Content\App\Translation\Data\TextTranslation;
class TextTranslationCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TextTranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextTranslationModel();
}
}