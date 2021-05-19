<?php

namespace Nemundo\Content\App\IssueTracker\Content\Solved;

use Nemundo\Content\App\IssueTracker\Content\Issue\IssueProcess;
use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Content\Index\Log\Type\AbstractLogContentType;
use Nemundo\Content\Index\Tree\Event\TreeEvent;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\EventTrait;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Random\UniqueId;


// AbstractLog

class SolvedContentType extends AbstractContentType   // AbstractLogContentType  // AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Solved';
        $this->typeId = 'c6c03ec0-9e7c-4421-a2ae-b12297cf2ff2';
        $this->formClassList[] = SolvedContentForm::class;
        $this->viewClassList[] = SolvedContentView::class;
    }

    protected function onCreate()
    {

        $this->dataId = (new UniqueId())->getUniqueId();

        // getParent


        /** @var TreeEvent $event */
        foreach ($this->getEventList() as $event) {
            //(new Debug())->write($event);

            if ($event->isObjectOfClass(TreeEvent::class)) {

                /** @var IssueProcess $conent */
                $content = (new ContentBuilder())->getContent($event->parentId);

                //(new Debug())->write($conent);
                //(new Debug())->write($conent->getSubject());


                $issueRow = $content->getDataRow();

                $content->issue =$issueRow->issue.' ERLEDIGT';
                $content->saveType();


            }



        }


       // exit;




    }

    protected function onUpdate()
    {
    }

    protected function onDelete()
    {
    }

    protected function onIndex()
    {
    }

    protected function onDataRow()
    {
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }
}