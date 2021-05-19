<?php
namespace Nemundo\Content\App\File\Data\DownloadJob;
class DownloadJobDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var DownloadJobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DownloadJobModel();
}
}