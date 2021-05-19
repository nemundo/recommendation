<?php
namespace Nemundo\Content\App\Translation\Data\Translation;
use Nemundo\Model\Id\AbstractModelIdValue;
class TranslationId extends AbstractModelIdValue {
/**
* @var TranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TranslationModel();
}
}