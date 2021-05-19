<?php

namespace Nemundo\App\ModelDesigner\Com\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\FieldNameParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\Type\TypeDeleteSite;
use Nemundo\App\ModelDesigner\Site\Type\TypeEditSite;
use Nemundo\App\ModelDesigner\Site\Type\TypeSortableSite;
use Nemundo\App\ModelDesigner\Site\Type\TypeUndoDeleteSite;
use Nemundo\App\ModelDesigner\Type\ModelDesignerTypeTrait;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Type\AbstractType;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\OrmTypeTrait;
use Nemundo\Package\JqueryUi\Sortable\JquerySortable;

class ModelTypeTable extends AdminTable
{

    /**
     * @var AbstractOrmModel
     */
    public $model;


    public function getContent()
    {

        $this->id = 'model_type';

        $header = new AdminTableHeader($this);

        $header->addText('Label');
        $header->addText('Field Name');
        $header->addText('Variable Name');
        $header->addText('Allow Null');
        $header->addText('Type');
        $header->addEmpty();
        $header->addEmpty();
        $header->addEmpty();

        /** @var AbstractModelType|AbstractType|ModelDesignerTypeTrait|OrmTypeTrait $type */
        foreach ($this->model->getTypeList(false, false) as $type) {

            $row = new TableRow($this);
            $row->strikeThrough = $type->isDeleted;
            $row->addText($type->label);
            $row->addText($type->fieldName);
            $row->addText($type->variableName);
            $row->addYesNo($type->allowNullValue);
            $row->addText($type->typeLabel);

            if ($type->isObjectOfTrait(ModelDesignerTypeTrait::class)) {
                $row->addText($type->getAdditionalInformation());
            } else {
                $row->addEmpty();
            }

            if ($type->isEditable) {

                $site = clone(TypeEditSite::$site);
                $site->addParameter(new ProjectParameter());
                $site->addParameter(new AppParameter());
                $site->addParameter(new ModelParameter());
                $site->addParameter(new FieldNameParameter($type->fieldName));
                $row->addIconSite($site);

                if ($type->isDeleted) {
                    $site = clone(TypeUndoDeleteSite::$site);
                    $site->addParameter(new ProjectParameter());
                    $site->addParameter(new AppParameter());
                    $site->addParameter(new ModelParameter());
                    $site->addParameter(new FieldNameParameter($type->fieldName));
                    $row->addIconSite($site);
                } else {
                    $site = clone(TypeDeleteSite::$site);
                    $site->addParameter(new ProjectParameter());
                    $site->addParameter(new AppParameter());
                    $site->addParameter(new ModelParameter());
                    $site->addParameter(new FieldNameParameter($type->fieldName));
                    $row->addIconSite($site);
                }

            } else {
                $row->addEmpty();
                $row->addEmpty();
            }

        }

        $sortable = new JquerySortable($this);
        $sortable->id = $this->id . ' tbody';
        $sortable->sortableSite = clone(TypeSortableSite::$site);

        return parent::getContent();

    }

}