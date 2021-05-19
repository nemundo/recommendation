<?php
namespace Nemundo\Content\App\File\Data\DownloadJob;
use Nemundo\Model\Id\AbstractModelIdValue;
class DownloadJobId extends AbstractModelIdValue {
/**
* @var DownloadJobModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DownloadJobModel();
}
}