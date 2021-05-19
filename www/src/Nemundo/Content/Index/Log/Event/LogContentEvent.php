<?php


namespace Nemundo\Content\Index\Log\Event;


use Nemundo\Content\Event\AbstractContentEvent;
use Nemundo\Content\Index\Log\Data\Log\Log;
use Nemundo\Content\Index\Log\Type\CreateLogContentType;
use Nemundo\Content\Index\Log\Type\ModifiedLogContentType;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Type\AbstractType;
use Nemundo\Core\Debug\Debug;

class LogContentEvent extends AbstractContentEvent
{

    /**
     * @param AbstractType|AbstractTreeContentType $contentType
     */
    public function onCreate(AbstractType $contentType)
    {

        /*$data=new Log();
        $data->contentId=$contentType->getContentId();
        $data->save();*/


        $type=new CreateLogContentType();
        $type->itemContentId=$contentType->getContentId();
        $type->saveType();


    }


    /**
     * @param AbstractType|AbstractTreeContentType $contentType
     */
    public function onUpdate(AbstractType $contentType)
    {

        /*(new Debug())->write('update');
        exit;*/

        $type=new ModifiedLogContentType();
        $type->itemContentId=$contentType->getContentId();
        $type->saveType();

        /*
        $data=new Log();
        $data->contentId=$contentType->getContentId();
        $data->save();*/

    }

}