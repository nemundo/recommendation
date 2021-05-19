<?php

namespace Nemundo\Content\App\Text\Content\VersionLargeText;

use Nemundo\Content\App\Text\Content\LargeText\AbstractLargeTextContentType;
use Nemundo\Content\App\Text\Data\VersionText\VersionText;
use Nemundo\Content\App\Text\Data\VersionText\VersionTextCount;


class VersionLargeTextContentType extends AbstractLargeTextContentType
{

    protected function loadContentType()
    {
        $this->typeLabel = 'Version Large Text';
        $this->typeId = '83d2fece-9b64-40e1-9d02-6ae08241d83a';
        $this->viewClassList[]  = VersionLargeTextContentView::class;
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

        $data = new VersionLarText();
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