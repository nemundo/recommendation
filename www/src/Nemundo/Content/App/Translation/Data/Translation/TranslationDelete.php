<?php
namespace Nemundo\Content\App\Translation\Data\Translation;
class TranslationDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TranslationModel();
}
}