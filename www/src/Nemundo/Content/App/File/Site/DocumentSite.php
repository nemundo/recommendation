<?php
namespace Nemundo\Content\App\File\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Content\App\File\Page\DocumentPage;
class DocumentSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Document';
$this->url = 'document';
}
public function loadContent() {
(new DocumentPage())->render();
}
}