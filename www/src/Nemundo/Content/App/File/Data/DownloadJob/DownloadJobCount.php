<?php
namespace Nemundo\Content\App\File\Data\DownloadJob;
class DownloadJobCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var DownloadJobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DownloadJobModel();
}
}