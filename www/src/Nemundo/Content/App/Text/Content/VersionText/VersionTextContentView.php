<?php

namespace Nemundo\Content\App\Text\Content\VersionText;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\Text\Data\VersionText\VersionTextReader;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Block\Div;

class VersionTextContentView extends AbstractContentView
{
    /**
     * @var VersionTextContentType
     */
    public $contentType;

    protected function loadView()
    {
        // TODO: Implement loadView() method.
    }

    public function getContent()
    {

        $textRow = $this->contentType->getDataRow();

        $p = new Div($this);
        $p->content = $textRow->text;



        if ($this->contentType->getVersionCount()>1) {


        $table=new AdminTable($this);

        $reader=new VersionTextReader();
        $reader->model->loadUser();
        $reader->filter->andEqual($reader->model->textId,$this->contentType->getDataId());
        $reader->addOrder($reader->model->id);

        $header=new TableHeader($table);
        $header->addText($reader->model->versionText->label);
        $header->addText($reader->model->user->label);
        $header->addText($reader->model->dateTime->label);


        foreach ($reader->getData() as $versionTextRow) {

            $row=new TableRow($table);
            $row->addText($versionTextRow->versionText);
            $row->addText($versionTextRow->user->displayName);
            $row->addText($versionTextRow->dateTime->getShortDateTimeLeadingZeroFormat());

        }

        }


        return parent::getContent();
    }
}