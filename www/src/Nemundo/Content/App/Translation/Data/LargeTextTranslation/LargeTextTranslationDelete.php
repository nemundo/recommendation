<?php
namespace Nemundo\Content\App\Translation\Data\LargeTextTranslation;
class LargeTextTranslationDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var LargeTextTranslationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new LargeTextTranslationModel();
}
}