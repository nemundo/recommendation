<?php
namespace Nemundo\Content\App\PublicShare\Data\PublicShare;
class PublicShareCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PublicShareModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicShareModel();
}
}