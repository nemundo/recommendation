<?php


namespace Nemundo\Content\Setup;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\Collection\AbstractContentTypeCollection;
use Nemundo\Content\Data\ApplicationContentType\ApplicationContentType;
use Nemundo\Content\Data\ApplicationContentType\ApplicationContentTypeDelete;
use Nemundo\Content\Data\ApplicationContentType\ApplicationContentTypeUpdate;
use Nemundo\Content\Type\AbstractType;
use Nemundo\Core\Debug\Debug;

class ApplicationContentTypeSetup extends AbstractContentTypeSetup
{

    public function __construct(AbstractApplication $application)
    {
        parent::__construct($application);
    }


    public function addContentType(AbstractType $contentType)
    {

        parent::addContentType($contentType);

        $data = new ApplicationContentType();
        $data->ignoreIfExists = true;
        $data->applicationId = $this->application->applicationId;
        $data->contentTypeId = $contentType->typeId;
        $data->setupStatus = true;
        $data->save();

        return $this;

    }


    public function addContentTypeCollection(AbstractContentTypeCollection $collection)
    {

        foreach ($collection->getContentTypeList() as $contentType) {
            $this->addContentType($contentType);
        }

        return $this;

    }


    public function resetSetupStatus()
    {

        $update = new ApplicationContentTypeUpdate();
        $update->filter->andEqual($update->model->applicationId, $this->application->applicationId);
        $update->setupStatus = false;
        $update->update();

    }


    // removeUnused
    public function deleteUnusedSetupStatus()
    {

        $delete = new ApplicationContentTypeDelete();
        $delete->filter->andEqual($delete->model->applicationId, $this->application->applicationId);
        $delete->filter->andEqual($delete->model->setupStatus,false);  //0);  // false);
        $delete->delete();

    }

}