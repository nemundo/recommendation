<?php

namespace Nemundo\Content\App\Feedback\Content\FeedbackListing;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\App\Feedback\Data\Feedback\FeedbackReader;
use Nemundo\Content\View\AbstractContentView;

class FeedbackListingContentView extends AbstractContentView
{
    /**
     * @var FeedbackListingContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName='default';
        $this->viewId='b483793c-f53c-4d26-b2a0-1355c1b33fc4';
        $this->defaultView=true;

    }


    public function getContent()
    {


        $table = new AdminTable($this);

        $reader = new FeedbackReader();

        foreach ($reader->getData() as $feedbackRow) {


            $row = new TableRow($table);
            $row->addText($feedbackRow->contact);
            $row->addText($feedbackRow->email);
            $row->addText($feedbackRow->message);


        }



        return parent::getContent();
    }
}