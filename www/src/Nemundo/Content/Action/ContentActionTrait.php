<?php


namespace Nemundo\Content\Action;


trait ContentActionTrait
{

    /**
     * @var AbstractContentAction[]
     */
    private $contentActionList = [];

    public function addContentAction(AbstractContentAction $contentAction)
    {

        $this->contentActionList[] = $contentAction;
        return $this;

    }

    public function getContentActionList()
    {

        return $this->contentActionList;

    }


}