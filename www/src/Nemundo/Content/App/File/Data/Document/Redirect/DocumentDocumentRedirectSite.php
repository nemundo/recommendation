<?php
namespace Nemundo\Content\App\File\Data\Document\Redirect;
class DocumentDocumentRedirectSite extends \Nemundo\Model\Redirect\AbstractRedirectFilenameSite {
public function loadSite() {
parent::loadSite();
$this->url = "file-document-document-redirect";
$this->model = new  \Nemundo\Content\App\File\Data\Document\DocumentModel();
$this->type = $this->model->document;
DocumentRedirectConfig::$redirectDocumentDocumentSite = $this;
}
}