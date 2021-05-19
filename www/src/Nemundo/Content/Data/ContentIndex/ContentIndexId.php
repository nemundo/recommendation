<?php
namespace Nemundo\Content\Data\ContentIndex;
use Nemundo\Model\Id\AbstractModelIdValue;
class ContentIndexId extends AbstractModelIdValue {
/**
* @var ContentIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentIndexModel();
}
}