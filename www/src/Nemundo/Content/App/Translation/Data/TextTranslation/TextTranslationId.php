<?php
namespace Nemundo\Content\App\Translation\Data\TextTranslation;
use Nemundo\Model\Id\AbstractModelIdValue;
class TextTranslationId extends AbstractModelIdValue {
/**
* @var TextTranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextTranslationModel();
}
}