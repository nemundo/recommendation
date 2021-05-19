<?php


namespace Nemundo\Content\Type;


use Nemundo\Content\Data\Content\Content;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\Content\ContentDelete;
use Nemundo\Content\Data\Content\ContentId;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Data\Content\ContentUpdate;
use Nemundo\Content\Row\ContentCustomRow;
use Nemundo\Content\Type\Index\ContentIndexBuilder;
use Nemundo\Core\Type\DateTime\DateTime;

trait ContentIndexTrait
{

    abstract public function getSubject();


    /**
     * @var DateTime
     */
    //public $dateTime;

    /**
     * @var string
     */
    //public $toId;


    protected $contentId;

    /**
     * @var ContentCustomRow
     */
    private $contentRow;


    /*protected function loadUserDateTime()
    {

        /*
        $this->dateTime = (new DateTime())->setNow();

        if ((new UserSession())->isUserLogged()) {
            $this->toId = (new UserSession())->userId;
        } else {
            $this->toId = '';
        }*/

    //}


    public function getContentRow()
    {

        if ($this->contentRow == null) {
            $contentReader = new ContentReader();
            //$contentReader->model->loadUser();
            $contentReader->filter->andEqual($contentReader->model->contentTypeId, $this->typeId);
            $contentReader->filter->andEqual($contentReader->model->dataId, $this->getDataId());
            $this->contentRow = $contentReader->getRow();
        }

        return $this->contentRow;

    }


    public function getContentId()
    {

        if ($this->contentId == null) {

            if ($this->existContent()) {

                $id = new ContentId();
                $id->filter->andEqual($id->model->contentTypeId, $this->typeId);
                $id->filter->andEqual($id->model->dataId, $this->getDataId());
                $this->contentId = $id->getId();
            }

        }

        return $this->contentId;

    }


    public function existContent()
    {

        $value = true;

        $count = new ContentCount();
        $count->filter->andEqual($count->model->contentTypeId, $this->typeId);
        $count->filter->andEqual($count->model->dataId, $this->dataId);
        if ($count->getCount() == 0) {
            $value = false;
        }

        return $value;

    }


    protected function saveContent()
    {

        $this->dataRow = null;

        if (!$this->existContent()) {

            $index=new ContentIndexBuilder($this);
            $index->buildIndex();

            /*
            $data = new Content();
            $data->contentTypeId = $this->typeId;
            $data->dataId = $this->getDataId();
            $data->save();*/

        }

    }


    protected function updateContent()
    {

        $data = new Content();
        $data->updateOnDuplicate = true;
        $data->contentTypeId = $this->typeId;
        $data->dataId = $this->getDataId();
        $data->save();

    }


    protected function saveContentIndex()
    {

        $update = new ContentUpdate();
        $update->subject = $this->getSubject();
        $update->updateById($this->getContentId());

    }


    protected function deleteContent()
    {

        (new ContentDelete())->deleteById($this->getContentId());

    }


}