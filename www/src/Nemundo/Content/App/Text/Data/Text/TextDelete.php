<?php
namespace Nemundo\Content\App\Text\Data\Text;
class TextDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TextModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TextModel();
}
}