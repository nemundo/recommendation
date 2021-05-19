<?php
namespace Nemundo\Content\App\FileTransfer\Data\File\Redirect;
class FileFileRedirectSite extends \Nemundo\Model\Redirect\AbstractRedirectFilenameSite {
public function loadSite() {
parent::loadSite();
$this->url = "filetransfer-file-file-redirect";
$this->model = new  \Nemundo\Content\App\FileTransfer\Data\File\FileModel();
$this->type = $this->model->file;
FileRedirectConfig::$redirectFileFileSite = $this;
}
}