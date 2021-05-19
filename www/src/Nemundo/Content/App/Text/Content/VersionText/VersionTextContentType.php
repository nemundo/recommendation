<?php

namespace Nemundo\Content\App\Text\Content\VersionText;

use Nemundo\Content\App\Text\Content\Text\AbstractTextContentType;
use Nemundo\Content\App\Text\Data\VersionText\VersionText;
use Nemundo\Content\App\Text\Data\VersionText\VersionTextCount;

class VersionTextContentType extends AbstractTextContentType
{


    protected function loadContentType()
    {
        $this->typeLabel = 'Version Text';
        $this->typeId = '7a007ea1-bec1-48eb-b0ed-3c35450311e6';
        $this->viewClassList[]  = VersionTextContentView::class;
    }


    protected function onCreate()
    {

        parent::onCreate();
        $this->saveVersion();

    }

    protected function onUpdate()
    {

        parent::onUpdate();
        $this->saveVersion();

    }


    private function saveVersion()
    {

        $data = new VersionText();
        $data->textId = $this->getDataId();
        $data->versionText = $this->text;
        $data->save();

    }


    public function getVersionCount() {


        $count=new VersionTextCount();
        $count->filter->andEqual($count->model->textId, $this->getDataId());
        return $count->getCount();


    }


}