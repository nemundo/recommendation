<?php


namespace Nemundo\Content\Index\Tree\Reader;


use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Row\ContentCustomRow;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\DataSource\AbstractDataSource;

abstract class AbstractParentChildContentTypeReader extends AbstractDataSource
{

    /**
     * @var AbstractContentType
     */
    public $contentType;


    abstract protected function getList($contentId,$list);


    protected function loadData()
    {

        $list= $this->getList($this->contentType->getContentId(),[]);

        foreach ($list as $contentType) {
            $this->addItem($contentType);
        }

        // TODO: Implement loadData() method.
    }


    /*
    protected function loadData()
    {

        //foreach ($contentType->getParentParentContentTypeList() as $parent) {

       /*     $site = clone($this->redirectSite);
            $site->title = $parent->getSubject();
            $site->addParameter(new ContentParameter($parent->getContentId()));
            $this->addSite($site);

            /*$site = clone($this->redirectSite);
            $site->title = $contentType->getSubject();
            $site->addParameter(new ContentParameter($contentType->getContentId()));
            $this->addSite($site);*/

        //}


        // TODO: Implement loadData() method.
    //}


    /**
     * @return AbstractContentType[]
     */
    public function getData()
    {
        return parent::getData();
    }



    /*
    private function getParent($contentId,$list) {


        $reader = new TreeReader();
        $reader->model->loadParent();
        $reader->model->parent->loadContentType();
        $reader->filter->andEqual($reader->model->childId, $contentId);
        foreach ($reader->getData() as $treeRow) {
            $list[] = $treeRow->parent->getContentType();
            $list = $this->getParent($treeRow->parentId,$list);
        }

        return $list;

    }*/



}