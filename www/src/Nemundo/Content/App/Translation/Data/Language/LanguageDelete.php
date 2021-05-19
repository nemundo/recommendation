<?php
namespace Nemundo\Content\App\Translation\Data\Language;
class LanguageDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var LanguageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LanguageModel();
}
}