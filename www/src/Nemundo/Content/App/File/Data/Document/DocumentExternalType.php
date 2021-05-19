<?php
namespace Nemundo\Content\App\File\Data\Document;
class DocumentExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\File\RedirectFilenameType
*/
public $document;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $text;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = DocumentModel::class;
$this->externalTableName = "file_document";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->document = new \Nemundo\Model\Type\File\RedirectFilenameType();
$this->document->fieldName = "document";
$this->document->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->document->externalTableName = $this->externalTableName;
$this->document->aliasFieldName = $this->document->tableName . "_" . $this->document->fieldName;
$this->document->label = "Document";
$this->document->redirectSite = \Nemundo\Content\App\File\Data\Document\Redirect\DocumentRedirectConfig::$redirectDocumentDocumentSite;
$this->document->createObject();
$this->addType($this->document);

$this->text = new \Nemundo\Model\Type\Text\LargeTextType();
$this->text->fieldName = "text";
$this->text->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->text->externalTableName = $this->externalTableName;
$this->text->aliasFieldName = $this->text->tableName . "_" . $this->text->fieldName;
$this->text->label = "Text";
$this->addType($this->text);

}
}