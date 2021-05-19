<?php

namespace Nemundo\Content\App\Text\Content\Text;


use Nemundo\Content\App\Text\Data\Text\Text;
use Nemundo\Content\App\Text\Data\Text\TextDelete;
use Nemundo\Content\App\Text\Data\Text\TextReader;
use Nemundo\Content\App\Text\Data\Text\TextRow;
use Nemundo\Content\App\Text\Data\Text\TextUpdate;
use Nemundo\Content\Index\Search\Type\SearchIndexTrait;
use Nemundo\Content\Index\Tree\Com\Form\ContentSearchForm;
use Nemundo\Content\Type\AbstractContentType;


abstract class AbstractTextContentType extends AbstractContentType
{

    use SearchIndexTrait;

    public $text;

    public function __construct($dataId = null)
    {

        $this->formClassList[] = TextContentForm::class;

        $this->formPartClass = TextContentFormPart::class;
        $this->viewClassList[] = TextContentView::class;
        $this->listingClass = TextParentContentList::class;

        parent::__construct($dataId);
    }


    protected function onCreate()
    {

        $data = new Text();
        $data->text = $this->text;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new TextUpdate();
        $update->text = $this->text;
        $update->updateById($this->dataId);

    }


    protected function onIndex()
    {

        $textRow = $this->getDataRow();
        $this->addSearchText($textRow->text);

        /*
        $data=new TextIndex();
        $data->updateOnDuplicate=true;
        $data->parentId=$this->getParentId();
        $data->contentId=$this->getContentId();
        $data->text=$textRow->text;
        $data->save();*/

    }

    protected function onDelete()
    {
        (new TextDelete())->deleteById($this->dataId);
        //$this->deleteSearchIndex();

    }


    protected function onDataRow()
    {
        $this->dataRow = (new TextReader())->getRowById($this->dataId);
    }


    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|TextRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {

        return $this->getDataRow()->text;
    }


    public function getData()
    {

        $data['id'] = $this->dataId;
        $data['text'] = $this->getDataRow()->text;

        return $data;

    }


    public function importJson($data)
    {

        $this->text = $data['text'];
        $this->saveType();

    }

}