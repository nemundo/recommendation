<?php


namespace Nemundo\Srf\Content\Channel;


use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Relation\Com\RelationTable;

class ChannelContentView extends AbstractContentView
{

    public function getContent()
    {

        $title = new AdminTitle($this);
        $title->content = $this->contentType->getSubject();


        $table=new RelationTable($this);
        $table->contentId=$this->contentType->getContentId();


        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}