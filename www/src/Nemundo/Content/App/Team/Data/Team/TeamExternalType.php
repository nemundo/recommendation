<?php
namespace Nemundo\Content\App\Team\Data\Team;
class TeamExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $team;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = TeamModel::class;
$this->externalTableName = "team_team";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->team = new \Nemundo\Model\Type\Text\TextType();
$this->team->fieldName = "team";
$this->team->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->team->externalTableName = $this->externalTableName;
$this->team->aliasFieldName = $this->team->tableName . "_" . $this->team->fieldName;
$this->team->label = "Team";
$this->addType($this->team);

}
}