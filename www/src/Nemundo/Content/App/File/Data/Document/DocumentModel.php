<?php
namespace Nemundo\Content\App\File\Data\Document;
class DocumentModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "file_document";
$this->aliasTableName = "file_document";
$this->label = "Document";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "file_document";
$this->id->externalTableName = "file_document";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "file_document_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->document = new \Nemundo\Model\Type\File\RedirectFilenameType($this);
$this->document->tableName = "file_document";
$this->document->externalTableName = "file_document";
$this->document->fieldName = "document";
$this->document->aliasFieldName = "file_document_document";
$this->document->label = "Document";
$this->document->allowNullValue = true;
$this->document->redirectSite = \Nemundo\Content\App\File\Data\Document\Redirect\DocumentRedirectConfig::$redirectDocumentDocumentSite;

$this->text = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->text->tableName = "file_document";
$this->text->externalTableName = "file_document";
$this->text->fieldName = "text";
$this->text->aliasFieldName = "file_document_text";
$this->text->label = "Text";
$this->text->allowNullValue = true;

}
}