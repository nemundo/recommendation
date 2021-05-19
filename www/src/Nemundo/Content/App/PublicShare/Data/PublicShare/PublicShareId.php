<?php
namespace Nemundo\Content\App\PublicShare\Data\PublicShare;
use Nemundo\Model\Id\AbstractModelIdValue;
class PublicShareId extends AbstractModelIdValue {
/**
* @var PublicShareModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PublicShareModel();
}
}