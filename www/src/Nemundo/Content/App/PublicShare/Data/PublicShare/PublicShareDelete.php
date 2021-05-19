<?php
namespace Nemundo\Content\App\PublicShare\Data\PublicShare;
class PublicShareDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PublicShareModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicShareModel();
}
}