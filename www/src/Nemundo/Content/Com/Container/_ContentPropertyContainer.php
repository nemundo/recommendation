<?php


namespace Nemundo\Content\Com\Container;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\Form\AbstractContentContainer;

class ContentPropertyContainer extends AbstractContentContainer
{

    public function getContent()
    {

        $widget = new AdminWidget($this);
        $widget->widgetTitle = 'Content';

        $table = new AdminLabelValueTable($widget);
        //$table->addLabelValue('Created', $this->contentType->getContentRow()->dateTime->getShortDateTimeLeadingZeroFormat());
        $table->addLabelValue('Last Change', '');
        //$table->addLabelValue('User', $this->contentType->getContentRow()->user->displayName);

        return parent::getContent();

    }

}