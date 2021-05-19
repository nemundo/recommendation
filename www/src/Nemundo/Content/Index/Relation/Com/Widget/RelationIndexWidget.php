<?php

namespace Nemundo\Content\Index\Relation\Com\Widget;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\Com\Container\AbstractContentTypeContainer;

use Nemundo\Content\Index\Relation\Com\Admin\RelationAdmin;
use Nemundo\Content\Index\Relation\Com\Form\RelationForm;
use Nemundo\Content\Index\Relation\Com\Table\RelationIndexTable;


// RelationWidget
class RelationIndexWidget extends AbstractContentTypeContainer // AdminWidget
{


    public function getContent()
    {

        $widget=new AdminWidget($this);
        $widget->widgetTitle='Relation';

        /*$admin = new RelationAdmin($this);
        $admin->redirectSite=$this->redirectSite;
        $admin->contentType=$this->contentType;*/

        $form=new RelationForm($widget);
        $form->contentType=$this->contentType;

        $table=new RelationIndexTable($widget);
        $table->contentType=$this->contentType;
        $table->redirectSite = $this->redirectSite;

        return parent::getContent();

    }


}