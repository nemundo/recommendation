<?php
namespace Nemundo\Content\App\File\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class FileModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\App\File\Data\Audio\AudioModel());
$this->addModel(new \Nemundo\Content\App\File\Data\Document\DocumentModel());
$this->addModel(new \Nemundo\Content\App\File\Data\DownloadJob\DownloadJobModel());
$this->addModel(new \Nemundo\Content\App\File\Data\File\FileModel());
$this->addModel(new \Nemundo\Content\App\File\Data\FileIndex\FileIndexModel());
$this->addModel(new \Nemundo\Content\App\File\Data\Image\ImageModel());
$this->addModel(new \Nemundo\Content\App\File\Data\ImageIndex\ImageIndexModel());
$this->addModel(new \Nemundo\Content\App\File\Data\Video\VideoModel());
$this->addModel(new \Nemundo\Content\App\File\Data\WebFile\WebFileModel());
}
}