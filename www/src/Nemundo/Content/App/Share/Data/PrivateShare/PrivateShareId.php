<?php
namespace Nemundo\Content\App\Share\Data\PrivateShare;
use Nemundo\Model\Id\AbstractModelIdValue;
class PrivateShareId extends AbstractModelIdValue {
/**
* @var PrivateShareModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PrivateShareModel();
}
}