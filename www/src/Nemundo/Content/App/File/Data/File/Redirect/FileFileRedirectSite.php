<?php
namespace Nemundo\Content\App\File\Data\File\Redirect;
class FileFileRedirectSite extends \Nemundo\Model\Redirect\AbstractRedirectFilenameSite {
public function loadSite() {
parent::loadSite();
$this->url = "file-file-file-redirect";
$this->model = new  \Nemundo\Content\App\File\Data\File\FileModel();
$this->type = $this->model->file;
FileRedirectConfig::$redirectFileFileSite = $this;
}
}