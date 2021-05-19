<?php

namespace Nemundo\Content\Action;


use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Content\Parameter\ContentParameter;

class DeleteContentAction extends AbstractContentAction
{

    protected function loadContentType()
    {
        // TODO: Implement loadContentType() method.

        $this->typeLabel='Delete Content Action';
        $this->typeId='a6e848c9-3025-46e4-9583-ff7d1c1f6488';

        $this->actionLabel='Delete Content';

    }


    public function onAction()
    {

        $content = (new ContentBuilder())->getContent($this->actionContentId);
        $content->deleteType();


        // redirect --> remove content parameter


    }


}