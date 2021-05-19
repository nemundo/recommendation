<?php
namespace Nemundo\Content\App\Translation\Data\LargeTextTranslation;
class LargeTextTranslationBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var LargeTextTranslationModel
*/
protected $model;

public function __construct() {
parent::__construct();
$this->model = new LargeTextTranslationModel();
}
public function save() {
$id = parent::save();
return $id;
}
}