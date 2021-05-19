<?php


namespace Nemundo\Content\Index\Tree\Type;


use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Content\Collection\AbstractContentTypeCollection;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Data\ContentView\ContentViewReader;
use Nemundo\Content\Index\Tree\Data\Tree\TreeCount;
use Nemundo\Content\Index\Tree\Data\Tree\TreeDelete;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Index\Tree\Data\Tree\TreeRow;
use Nemundo\Content\Index\Tree\Index\TreeIndexBuilder;
use Nemundo\Content\Row\ContentCustomRow;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Debug\Debug;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Container\AbstractContainer;


trait TreeIndexTrait
{

    /**
     * @var string
     */
    public $parentId;

    /**
     * @var bool
     */
    public $restrictedChild = false;

    /**
     * @var bool
     */
    public $allowChild = true;

    /**
     * @var AbstractContentType[]
     */
    private $restrictedChildList = [];


    private $restrictedContentTypeCollectionClassList = [];

    /**
     * @var string
     */
    protected $parentListClass;


    public function addRestrictedContentTypeCollectionClass($className)
    {

        $this->restrictedContentTypeCollectionClassList[]=$className;

        return $this;

    }


    public function addRestrictedContentType(AbstractContentType $contentType)
    {

        $this->restrictedChildList[] = $contentType;
        return $this;

    }


    public function getRestrictedChildContentType()
    {

        $list = $this->restrictedChildList;
        /*foreach ($this->getRestrictedContentTypeCollectionList() as $collection) {
            foreach ($collection->getContentTypeList() as $contentType) {
                $list[]=$contentType;
            }
        }*/

        return $list;

    }


    public function getRestrictedContentTypeCollectionList()
    {

        /** @var AbstractContentTypeCollection $list */
        $list=[];

        foreach ($this->restrictedContentTypeCollectionClassList as $className) {

            //$contentType=new $className();
            $list[]=new $className();

        }

        return $list;

        //return $this->restrictedContentTypeCollectionClassList;


    }



    protected function saveTree()
    {

        if ($this->parentId !== null) {

            $allowed = false;

            if ($this->getParentContentType()->restrictedChild) {

                foreach ($this->getParentContentType()->getRestrictedChildContentType() as $child) {

                    if ($child->typeId == $this->typeId) {
                        $allowed = true;
                    }

                }

                if (!$allowed) {

                    /*
                    (new Debug())->write('Not allowed to attach');
                    exit;*/

                }

            }

            $writer = new TreeIndexBuilder();
            $writer->parentId = $this->parentId;
            $writer->childId = $this->getContentId();
            //$writer->viewId= $this->getDefaultTreeView() getDefaultTreeViewId();
            $writer->write();

        }

    }


    protected function deleteTree()
    {

        $delete = new TreeDelete();
        $delete->filter->orEqual($delete->model->parentId, $this->getContentId());
        $delete->filter->orEqual($delete->model->childId, $this->getContentId());
        $delete->delete();

    }


    protected function deleteChild()
    {

        foreach ($this->getChild() as $customRow) {

            $type = $customRow->child->getContentType();
            $type->deleteType();

        }

    }


    public function hasParent()
    {

        $value = false;
        if ($this->getParentCount() > 0) {
            $value = true;
        }
        return $value;

    }


    // braucht es diese Function???, ja zum anhängen
    public function addChild($childId)
    {

        $writer = new TreeIndexBuilder();
        $writer->parentId = $this->getContentId();
        $writer->childId = $childId;
        $writer->write();

        $this->saveIndex();

    }


    public function getChildReverse()
    {

        return $this->getChildContent(SortOrder::DESCENDING);
    }


    // getChildContentRowList
    // getChildContent
    public function getChild()
    {

        return $this->getChildContent(SortOrder::ASCENDING);

    }


    public function getChildContentTypeList()
    {

        /** @var AbstractTreeContentType[] $list */
        $list = [];

        foreach ($this->getChild() as $contentCustomRow) {
            $list[] = $contentCustomRow->child->getContentType();
        }

        return $list;

    }




    //getLastOf
    // getFirstOf
    // getChildOf


    public function hasChild()
    {

        $value = false;
        if ($this->getChildCount() > 0) {
            $value = true;
        }
        return $value;

    }


    public function getChildCount()
    {

        $count = new TreeCount();
        $count->filter->andEqual($count->model->parentId, $this->getContentId());
        return $count->getCount();

    }


    public function getParentCount()
    {

        $count = new TreeCount();
        $count->filter->andEqual($count->model->childId, $this->getContentId());
        return $count->getCount();

    }


    public function getFirst()
    {
        return $this->getChildRow(SortOrder::ASCENDING);
    }


    public function getLast()
    {
        return $this->getChildRow(SortOrder::DESCENDING);
    }


    public function getFirstOf(AbstractTreeContentType $contentType)
    {
        return $this->getFilterChildRow($contentType, SortOrder::ASCENDING);

    }


    public function getLastOf(AbstractTreeContentType $contentType)
    {

        return $this->getFilterChildRow($contentType, SortOrder::DESCENDING);

    }


    public function existsChildOf(AbstractTreeContentType $contentType)
    {

        $value = false;
        if ($this->getCountOf($contentType) > 0) {
            $value = true;
        }
        return $value;
    }


    // getChildCountOf
    public function getCountOf(AbstractTreeContentType $contentType)
    {

        $treeCount = new TreeCount();
        $treeCount->model->loadChild();
        $treeCount->filter->andEqual($treeCount->model->parentId, $this->getContentId());
        $treeCount->filter->andEqual($treeCount->model->child->contentTypeId, $contentType->typeId);

        return $treeCount->getCount();

    }


    private function getChildRow($sortOrder)
    {

        $reader = new TreeReader();
        $reader->model->loadChild();
        $reader->model->child->loadContentType();
        //$reader->model->child->loadUser();
        $reader->filter->andEqual($reader->model->parentId, $this->getContentId());
        //$reader->filter->andEqual($reader->model->child->contentTypeId, $filterContentType->typeId);
        $reader->addOrder($reader->model->itemOrder, $sortOrder);
        $reader->limit = 1;

        /** @var ContentCustomRow $doc */
        $doc = null;
        foreach ($reader->getData() as $treeRow) {
            $doc = $treeRow->child;
        }

        return $doc;

    }


    private function getFilterChildRow(AbstractTreeContentType $filterContentType, $sortOrder)
    {

        $reader = new TreeReader();
        $reader->model->loadChild();
        $reader->model->child->loadContentType();
        //$reader->model->child->loadUser();
        $reader->filter->andEqual($reader->model->parentId, $this->getContentId());
        $reader->filter->andEqual($reader->model->child->contentTypeId, $filterContentType->typeId);
        $reader->addOrder($reader->model->itemOrder, $sortOrder);
        $reader->limit = 1;

        /** @var ContentCustomRow $doc */
        $doc = null;
        foreach ($reader->getData() as $treeRow) {
            $doc = $treeRow->child;
        }

        return $doc;

    }


    private function getChildContent($sortOrder = SortOrder::DESCENDING)
    {

        $contentId = $this->getContentId();

        /** @var TreeRow[] $childList */
        $childList = [];

        if ($contentId !== null) {

            $reader = new TreeReader();
            $reader->model->loadChild();
            $reader->model->child->loadContentType();
            //$reader->model->child->loadUser();
            $reader->model->loadView();
            $reader->filter->andEqual($reader->model->parentId, $contentId);
            $reader->addOrder($reader->model->itemOrder, $sortOrder);
            foreach ($reader->getData() as $treeRow) {
                /*$treeRow->child->itemOrder = $treeRow->itemOrder;
                $childList[] = $treeRow->child;*/
                $childList[] = $treeRow;
            }

        }

        return $childList;

    }


    public function getChildTreeReader()
    {

        $reader = new TreeReader();
        $reader->model->loadChild();
        $reader->model->child->loadContentType();
        //$reader->model->child->loadUser();
        $reader->filter->andEqual($reader->model->parentId, $this->getContentId());

        return $reader;

        //$reader->addOrder($reader->model->itemOrder, $sortOrder);


    }


    public function removeFromParent()
    {

        $delete = new TreeDelete();
        $delete->filter->andEqual($delete->model->parentId, $this->parentId);
        $delete->filter->orEqual($delete->model->childId, $this->getContentId());
        $delete->delete();

    }


    public function removeChild($childId)
    {

        $delete = new TreeDelete();
        $delete->filter->andEqual($delete->model->parentId, $this->getContentId());
        $delete->filter->andEqual($delete->model->childId, $childId);
        $delete->delete();

    }


    public function getParentId()
    {

        if ($this->parentId == null) {

            $parentCount = 0;

            $reader = new TreeReader();
            $reader->filter->andEqual($reader->model->childId, $this->getContentId());
            foreach ($reader->getData() as $treeRow) {
                $this->parentId = $treeRow->parentId;
                $parentCount++;
            }


            /*if ($parentCount > 1) {
                (new LogMessage())->writeError('getParentId. More than one parent. Content Id: ' . $this->getContentId());
            }*/

        }

        return $this->parentId;

    }






    // getParentContentRow

    /**
     * @return ContentCustomRow[]
     */
    public function getParentContent()
    {

        $reader = new TreeReader();
        $reader->model->loadParent();
        $reader->model->parent->loadContentType();
        $reader->filter->andEqual($reader->model->childId, $this->getContentId());

        /** @var ContentCustomRow[] $doc */
        $doc = [];
        foreach ($reader->getData() as $treeRow) {

            $doc[] = $treeRow->parent;

        }

        return $doc;

    }


    public function getParentContentType()
    {

        $contentReader = new ContentReader();
        $contentReader->model->loadContentType();

        /** @var AbstractTreeContentType $parentContentType */
        $parentContentType = $contentReader->getRowById($this->getParentId())->getContentType();

        return $parentContentType;

    }


    public function getParentParentContentTypeList($list = null)
    {


        /** @var AbstractContentType[] $list */
        if ($list == null) {
            $list = [];
        }

        if ($this->hasParent()) {

            $parent = $this->getParentContentType();
            $list = $parent->getParentParentContentTypeList($list);
            $list[] = $parent;

        }

        return $list;


    }


    public function getParentDataId()
    {

        $contentReader = new ContentReader();
        $contentReader->model->loadContentType();
        //$dataId = $contentReader->getRowById($this->getParentId())->getDataIddataId;

        //return $dataId;

    }



    public function getDefaultTreeViewId() {

        $defaultViewId =null;

        $reader=new TreeReader();
        $reader->model->loadView();
        $reader->filter->andEqual($reader->model->childId,$this->getContentId());
        foreach ($reader->getData() as $treeRow) {
            $defaultViewId = $treeRow->viewId;
        }

        return $defaultViewId;

    }



    // getChildView (auslagern)
    public function getDefaultTreeView(AbstractContainer $parent = null) {

        $view=null;

        /*$reader=new TreeReader();
        $reader->model->loadView();
        $reader->filter->andEqual($reader->model->childId,$this->getContentId());
        foreach ($reader->getData() as $treeRow) {

            $viewClass = $treeRow->view->viewClass;

            if (class_exists($viewClass)) {
            $view = new $viewClass($parent);
                $view->contentType = $this;
            }

        }*/

        if ($view==null) {
            $view=$this->getDefaultView($parent);
        }

        return $view;

    }


}