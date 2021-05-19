<?php


namespace Nemundo\Content\App\Share\Action\PrivateShare;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\Action\AbstractActionContentView;
use Nemundo\Content\App\Share\Com\Table\PrivateShareTable;
use Nemundo\Content\App\Share\Data\PrivateShare\PrivateShareCount;

class PrivateShareActionView extends AbstractActionContentView
{

    protected function loadView()
    {
        $this->viewId = '0d1e4ff5-5ccd-4e22-9269-8a6a4566f816';

    }


    public function getContent()
    {

        $count = new PrivateShareCount();
        $count->filter->andEqual($count->model->contentId, $this->contentType->getContentId());
        if ($count->getCount() > 0) {

            $widget = new AdminWidget($this);
            $widget->widgetTitle = 'Private Share';

            $table = new PrivateShareTable($widget);
            $table->contentId = $this->contentType->getContentId();

        }

        return parent::getContent();

    }

}