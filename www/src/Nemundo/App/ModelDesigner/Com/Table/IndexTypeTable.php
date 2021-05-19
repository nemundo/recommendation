<?php

namespace Nemundo\App\ModelDesigner\Com\Table;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\FieldNameParameter;
use Nemundo\App\ModelDesigner\Parameter\IndexParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Site\Index\IndexTypeDeleteSite;
use Nemundo\App\ModelDesigner\Site\Type\TypeSortableSite;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Model\Definition\Index\AbstractModelIndex;
use Nemundo\Package\JqueryUi\Sortable\JquerySortable;

class IndexTypeTable extends AdminTable
{

    /**
     * @var AbstractModelIndex
     */
    public $index;

    public function getContent()
    {

        $this->id = 'index_type';

        $header = new AdminTableHeader($this);
        $header->addText('Type');
        $header->addEmpty();

        foreach ($this->index->getTypeList() as $type) {

            $row = new TableRow($this);
            $row->addText($type->fieldName);

            $site = clone(IndexTypeDeleteSite::$site);
            $site->addParameter(new ProjectParameter());
            $site->addParameter(new AppParameter());
            $site->addParameter(new ModelParameter());
            $site->addParameter(new IndexParameter());
            $site->addParameter(new FieldNameParameter($type->fieldName));

            $row->addIconSite($site);

        }

        $sortable = new JquerySortable($this);
        $sortable->id = $this->id . ' tbody';
        $sortable->sortableSite = clone(TypeSortableSite::$site);

        return parent::getContent();

    }

}