<?php
namespace Nemundo\Content\App\File\Data\DownloadJob;
class DownloadJobValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var DownloadJobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DownloadJobModel();
}
}