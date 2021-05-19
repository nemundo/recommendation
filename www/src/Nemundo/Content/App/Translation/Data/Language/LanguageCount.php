<?php
namespace Nemundo\Content\App\Translation\Data\Language;
class LanguageCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var LanguageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LanguageModel();
}
}