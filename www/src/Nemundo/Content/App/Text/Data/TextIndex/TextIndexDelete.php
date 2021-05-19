<?php
namespace Nemundo\Content\App\Text\Data\TextIndex;
class TextIndexDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TextIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextIndexModel();
}
}