<?php
namespace Nemundo\Content\App\Translation\Data\TextTranslation;
class TextTranslationDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TextTranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextTranslationModel();
}
}