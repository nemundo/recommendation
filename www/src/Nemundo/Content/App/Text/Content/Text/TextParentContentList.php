<?php


namespace Nemundo\Content\App\Text\Content\Text;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\Text\Data\TextIndex\TextIndexReader;
use Nemundo\Content\Index\Tree\Type\AbstractParentContentListing;

class TextParentContentList extends AbstractParentContentListing
{

    public function getContent()
    {

        $table = new AdminTable($this);

        $reader = new TextIndexReader();
        if ($this->parentId !== null) {
            $reader->filter->andEqual($reader->model->parentId, $this->parentId);
        }
        $reader->addOrder($reader->model->text);

        $header = new TableHeader($table);
        $header->addText($reader->model->text->label);

        foreach ($reader->getData() as $indexRow) {
            $row = new TableRow($table);
            $row->addText($indexRow->text);
        }

        return parent::getContent();

    }

}