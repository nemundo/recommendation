<?php


namespace Nemundo\Content\Setup;


use Nemundo\App\Application\Setup\AbstractSetup;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\Content\ContentDelete;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Data\ContentType\ContentType;
use Nemundo\Content\Data\ContentType\ContentTypeCount;
use Nemundo\Content\Data\ContentType\ContentTypeDelete;
use Nemundo\Content\Data\ContentType\ContentTypeUpdate;
use Nemundo\Content\Data\ContentView\ContentView;
use Nemundo\Content\Data\ContentView\ContentViewCount;
use Nemundo\Content\Data\ContentView\ContentViewDelete;
use Nemundo\Content\Data\ContentView\ContentViewUpdate;
use Nemundo\Content\Data\ViewContentType\ViewContentType;
use Nemundo\Content\Data\ViewContentType\ViewContentTypeCount;
use Nemundo\Content\Data\ViewContentType\ViewContentTypeDelete;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractType;
use Nemundo\Core\Language\Translation;
use Nemundo\Core\Log\LogMessage;

abstract class AbstractContentTypeSetup extends AbstractSetup
{

    protected function addContentType(AbstractType $contentType)
    {

        $contentLabel = (new Translation())->getText($contentType->typeLabel);
        if ($contentLabel == null) {
            $contentLabel = $contentType->getClassNameWithoutNamespace();
        }

        $count = new ContentTypeCount();
        $count->filter->andEqual($count->model->id, $contentType->typeId);
        if ($count->getCount() == 0) {
            $data = new ContentType();
            $data->id = $contentType->typeId;
            $data->contentType = $contentLabel;
            $data->phpClass = $contentType->getClassName();
            if ($this->application !== null) {
                $data->applicationId = $this->application->applicationId;
            }
            $data->setupStatus = true;
            $data->save();
        } else {

            $update = new ContentTypeUpdate();
            $update->contentType = $contentLabel;
            $update->phpClass = $contentType->getClassName();
            if ($this->application !== null) {
                $update->applicationId = $this->application->applicationId;
            }
            $update->setupStatus = true;
            $update->updateById($contentType->typeId);

        }


        if ($contentType->hasView()) {

            $count = new ViewContentTypeCount();
            $count->filter->andEqual($count->model->contentTypeId, $contentType->typeId);
            if ($count->getCount() == 0) {
                $data = new ViewContentType();
                $data->contentTypeId = $contentType->typeId;
                $data->save();
            }

        }


        $update = new ContentViewUpdate();
        $update->filter->andEqual($update->model->contentTypeId, $contentType->typeId);
        $update->setupStatus = false;
        $update->update();

        foreach ($contentType->getViewList() as $view) {

            $count = new ContentViewCount();
            $count->filter->andEqual($update->model->id, $view->viewId);
            if ($count->getCount() == 0) {
                $data = new ContentView();
                $data->id = $view->viewId;
                $data->contentTypeId = $contentType->typeId;
                $data->viewName = $view->viewName;
                $data->viewClass = $view->getClassName();
                $data->defaultView = $view->defaultView;
                $data->setupStatus = true;
                $data->save();
            } else {
                $update = new ContentViewUpdate();
                $update->viewName = $view->viewName;
                $update->viewClass = $view->getClassName();
                $update->defaultView = $view->defaultView;
                $update->setupStatus = true;
                $update->updateById($view->viewId);
            }

        }

        $delete = new ContentViewDelete();
        $delete->filter->andEqual($update->model->contentTypeId, $contentType->typeId);
        $delete->filter->andEqual($update->model->setupStatus, false);
        $delete->delete();

        return $this;

    }


    public function deleteContent(AbstractContentType $contentType)
    {

        $reader = new ContentReader();
        $reader->model->loadContentType();
        $reader->filter->andEqual($reader->model->contentTypeId, $contentType->typeId);
        foreach ($reader->getData() as $contentRow) {
            $contentType = $contentRow->getContentType();
            $contentType->deleteType();
        }

        $delete = new ContentDelete();
        $delete->filter->andEqual($reader->model->contentTypeId, $contentType->typeId);
        $delete->delete();


        return $this;

    }


    public function removeContent(AbstractContentType $contentType)
    {

        $contentCountTmp = -1;

        do {

            $reader = new ContentReader();
            $reader->model->loadContentType();
            $reader->filter->andEqual($reader->model->contentTypeId, $contentType->typeId);
            $reader->limit = 1000;
            foreach ($reader->getData() as $contentRow) {
                $contentType = $contentRow->getContentType();
                $contentType->deleteType();
            }

            $count = new ContentCount();
            $count->filter->andEqual($count->model->contentTypeId, $contentType->typeId);
            $contentCount = $count->getCount();

            if ($contentCount == $contentCountTmp) {
                (new LogMessage())->writeError('Invalid Content. Could not delete.');

                $delete = new ContentDelete();
                $delete->filter->andEqual($delete->model->contentTypeId, $contentType->typeId);
                $delete->delete();

            }
            $contentCountTmp = $contentCount;

        } while ($contentCount > 0);

        return $this;

    }


    public function removeType(AbstractType $type)
    {

        (new ContentTypeDelete())->deleteById($type->typeId);



        return $this;

    }




    public function removeContentTypeQuickly(AbstractContentType $contentType)
    {

        $delete = new ContentDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, $contentType->typeId);
        $delete->delete();


        $this->removeContentType($contentType);

        return $this;

    }




    public function removeContentType(AbstractContentType $contentType)
    {

        //$this->removeContent($contentType);

        (new ContentTypeDelete())->deleteById($contentType->typeId);

        $delete = new ContentViewDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, $contentType->typeId);
        $delete->delete();

        $delete = new ViewContentTypeDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, $contentType->typeId);
        $delete->delete();

        return $this;

    }

}