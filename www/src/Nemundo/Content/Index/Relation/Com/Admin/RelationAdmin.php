<?php

namespace Nemundo\Content\Index\Relation\Com\Admin;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\FormBuilder\RedirectTrait;
use Nemundo\Content\Com\Base\ContentTypeRedirectTrait;
use Nemundo\Content\Index\Relation\Data\Relation\RelationDelete;
use Nemundo\Content\Index\Relation\Data\Relation\RelationReader;
use Nemundo\Content\Index\Relation\Parameter\RelationParameter;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Web\Action\ActionSite;
use Nemundo\Web\Action\Site\DeleteActionSite;
use Nemundo\Web\Site\AbstractSite;

class RelationAdmin extends AbstractActionPanel
{

    use ContentTypeRedirectTrait;

    /**
     * @var AbstractSite
     */
    //public $redirectSite;

    /**
     * @var ActionSite
     */
    private $index;

    /**
     * @var ActionSite
     */
    private $delete;


    protected function loadActionSite()
    {
        // TODO: Implement loadActionSite() method.

        $this->index = new ActionSite($this);
        $this->index->url = '';
        $this->index->onAction = function () {

            $table  = new AdminClickableTable($this);

            $reader = new RelationReader();
            $reader->model->loadTo();
            $reader->filter->andEqual($reader->model->fromId,$this->contentType->getContentId());
            foreach ($reader->getData() as $relationRow) {

                $row=new BootstrapClickableTableRow($table);
                $row->addText($relationRow->to->subject);

                // delete

                $site = clone($this->delete);
                $site->addParameter(new RelationParameter($relationRow->id));
                $row->addIconSite($site);

                $site = clone($this->redirectSite);
                $site->addParameter(new ContentParameter($relationRow->toId));
                $row->addClickableSite($site);

            }


        };


        $this->delete = new DeleteActionSite($this);
        $this->delete->url = 'delete';
        $this->delete->title='Delete Relation';
        $this->delete->onAction = function () {

            $realtionId = (new RelationParameter())->getValue();
            (new RelationDelete())->deleteById($realtionId);
            (new UrlReferer())->redirect();

        };


    }



}