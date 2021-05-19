<?php
namespace Nemundo\Content\App\WebCrawler\Content\Domain;
use Nemundo\Content\View\AbstractContentView;
class DomainContentView extends AbstractContentView {
/**
* @var DomainContentType
*/
public $contentType;

protected function loadView() {
$this->viewName='default';
$this->viewId = '45993107-177e-404b-8bb2-a27fd8524a40';
$this->defaultView = true;
}
public function getContent() {
return parent::getContent();
}
}