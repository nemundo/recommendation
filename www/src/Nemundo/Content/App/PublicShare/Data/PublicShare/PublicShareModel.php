<?php
namespace Nemundo\Content\App\PublicShare\Data\PublicShare;
class PublicShareModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $viewId;

/**
* @var \Nemundo\Content\Data\ContentView\ContentViewExternalType
*/
public $view;

protected function loadModel() {
$this->tableName = "publicshare_public_share";
$this->aliasTableName = "publicshare_public_share";
$this->label = "Public Share";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "publicshare_public_share";
$this->id->externalTableName = "publicshare_public_share";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "publicshare_public_share_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "publicshare_public_share";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "publicshare_public_share_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = false;

$this->viewId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->viewId->tableName = "publicshare_public_share";
$this->viewId->fieldName = "view";
$this->viewId->aliasFieldName = "publicshare_public_share_view";
$this->viewId->label = "View";
$this->viewId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content";
$index->addType($this->contentId);

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "publicshare_public_share_content");
$this->content->tableName = "publicshare_public_share";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "publicshare_public_share_content";
$this->content->label = "Content";
}
return $this;
}
public function loadView() {
if ($this->view == null) {
$this->view = new \Nemundo\Content\Data\ContentView\ContentViewExternalType($this, "publicshare_public_share_view");
$this->view->tableName = "publicshare_public_share";
$this->view->fieldName = "view";
$this->view->aliasFieldName = "publicshare_public_share_view";
$this->view->label = "View";
}
return $this;
}
}