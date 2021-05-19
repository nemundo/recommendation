<?php
namespace Nemundo\Content\Data\ContentIndex;
class ContentIndexDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ContentIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentIndexModel();
}
}