<?php
namespace Nemundo\Content\App\Translation\Data\Translation;
class TranslationCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TranslationModel();
}
}