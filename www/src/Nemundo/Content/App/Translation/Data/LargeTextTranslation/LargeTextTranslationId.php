<?php
namespace Nemundo\Content\App\Translation\Data\LargeTextTranslation;
use Nemundo\Model\Id\AbstractModelIdValue;
class LargeTextTranslationId extends AbstractModelIdValue {
/**
* @var LargeTextTranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeTextTranslationModel();
}
}