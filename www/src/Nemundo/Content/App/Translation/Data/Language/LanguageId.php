<?php
namespace Nemundo\Content\App\Translation\Data\Language;
use Nemundo\Model\Id\AbstractModelIdValue;
class LanguageId extends AbstractModelIdValue {
/**
* @var LanguageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LanguageModel();
}
}