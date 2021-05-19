<?php
namespace Nemundo\Content\App\PublicShare\Data\PublicShare;
class PublicShareExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $viewId;

/**
* @var \Nemundo\Content\Data\ContentView\ContentViewExternalType
*/
public $view;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = PublicShareModel::class;
$this->externalTableName = "publicshare_public_share";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->contentId = new \Nemundo\Model\Type\Id\IdType();
$this->contentId->fieldName = "content";
$this->contentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentId->aliasFieldName = $this->contentId->tableName ."_".$this->contentId->fieldName;
$this->contentId->label = "Content";
$this->addType($this->contentId);

$this->viewId = new \Nemundo\Model\Type\Id\IdType();
$this->viewId->fieldName = "view";
$this->viewId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->viewId->aliasFieldName = $this->viewId->tableName ."_".$this->viewId->fieldName;
$this->viewId->label = "View";
$this->addType($this->viewId);

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_content");
$this->content->fieldName = "content";
$this->content->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->content->aliasFieldName = $this->content->tableName ."_".$this->content->fieldName;
$this->content->label = "Content";
$this->addType($this->content);
}
return $this;
}
public function loadView() {
if ($this->view == null) {
$this->view = new \Nemundo\Content\Data\ContentView\ContentViewExternalType(null, $this->parentFieldName . "_view");
$this->view->fieldName = "view";
$this->view->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->view->aliasFieldName = $this->view->tableName ."_".$this->view->fieldName;
$this->view->label = "View";
$this->addType($this->view);
}
return $this;
}
}