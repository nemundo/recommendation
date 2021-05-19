<?php

namespace Nemundo\Content\App\Stream\Content\StreamWidget;

use Nemundo\Content\App\Stream\Data\StreamWidget\StreamWidget;
use Nemundo\Content\Form\AbstractContentForm;

class StreamWidgetContentForm extends AbstractContentForm
{
    /**
     * @var StreamWidgetContentType
     */
    public $contentType;

    public function getContent()
    {
        return parent::getContent();
    }

    public function onSubmit()
    {


        $data=new StreamWidget();
        $data->limit = 10;
        $dataId = $data->save();

    $this->contentType->fromDataId($dataId);
        $this->contentType->saveType();


    }
}