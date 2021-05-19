<?php


namespace Nemundo\Content\Com\Menu;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Content\Type\AbstractMenuContentType;
use Nemundo\Content\Type\AbstractSequenceContentType;
use Nemundo\Process\Workflow\Parameter\StatusParameter;
use Nemundo\Web\Site\Site;


// SequenceMenu
class NextMenu extends AbstractHtmlContainer
{

    /**
     * @var AbstractSequenceContentType
     */
    public $contentType;

    /**
     * @var AbstractMenuContentType
     */
    //public $currentContentType;


    /**
     * @var AdminTable
     */
    //private $table;

    public function getContent()
    {

        // $table = new AdminTable($this);

        if ($this->contentType !== null) {


            foreach ($this->contentType->getMenuList() as $menu) {

                //(new Debug())->write($menu);

                $btn = new AdminSiteButton($this);
                $btn->site = new Site();
                $btn->site->title = $menu->typeLabel;
//            $btn->site->addParameter(new ContentTypeParameter($menu->typeId));
                $btn->site->addParameter(new StatusParameter($menu->typeId));

            }
        }

        //$this->addNextMenu($this->contentType);

        /*   protected function addNextStatusMenu(AbstractProcessStatus $status = null)
       {

           if ($status !== null) {
               //$this->addStatusLabel($status);
               $this->addLabel($status);
               $this->addNextStatusMenu($status->getNextStatus());
           }

       }*/

        return parent::getContent(); // TODO: Change the autogenerated stub
    }


    /*
    protected function addNextMenu(AbstractMenuContentType $status = null)
    {


        if ($status !== null) {

            $row = new TableRow($this->table);

            if ($status->typeId == $this->currentContentType->typeId) {
                $row->addBoldText($status->typeLabel);
            } else {
                $row->addText($status->typeLabel);
            }

            //$this->addStatusLabel($status);
            //$this->addLabel($status);
            $this->addNextMenu($status->getNextMenu());
        }

    }*/


}