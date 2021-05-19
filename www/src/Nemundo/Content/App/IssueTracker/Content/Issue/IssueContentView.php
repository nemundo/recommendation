<?php

namespace Nemundo\Content\App\IssueTracker\Content\Issue;

use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Paragraph\Paragraph;

class IssueContentView extends AbstractContentView
{
    /**
     * @var IssueProcess
     */
    public $contentType;

    protected function loadView()
    {
        // TODO: Implement loadView() method.
    }

    public function getContent()
    {

        $issueRow = $this->contentType->getDataRow();

        $p = new Paragraph($this);
        $p->content= (new Html(  $issueRow->description))->getValue();

        $table=new AdminLabelValueTable($this);
        $table->addLabelValue($issueRow->model->priority->label, $issueRow->priority->priority);


        // next action
        // done, chancel, reopen



        return parent::getContent();
    }
}