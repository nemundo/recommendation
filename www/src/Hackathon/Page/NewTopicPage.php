<?php

namespace Hackathon\Page;

use Hackathon\Com\TopicForm;
use Hackathon\Data\Topic\TopicReader;
use Hackathon\Parameter\TopicParameter;
use Hackathon\Site\TopicDeleteSite;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class NewTopicPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout=new BootstrapTwoColumnLayout($this);

        $form=new TopicForm($layout->col2);

        $table=new AdminTable($layout->col1);

        $reader=new TopicReader();
        $reader->addOrder($reader->model->topic);
        foreach ($reader->getData() as $topicRow) {

            $row=new AdminTableRow($table);
            $row->addText($topicRow->topic);

            $site=clone(TopicDeleteSite::$site);
            $site->addParameter(new TopicParameter($topicRow->id));
            $row->addIconSite($site);



        }



        return parent::getContent();
    }
}