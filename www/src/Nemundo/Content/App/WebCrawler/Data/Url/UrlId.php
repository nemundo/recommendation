<?php
namespace Nemundo\Content\App\WebCrawler\Data\Url;
use Nemundo\Model\Id\AbstractModelIdValue;
class UrlId extends AbstractModelIdValue {
/**
* @var UrlModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new UrlModel();
}
}