<?php
namespace Nemundo\Content\App\PublicShare\Data\PublicShare;
class PublicShareValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PublicShareModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicShareModel();
}
}