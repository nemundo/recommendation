<?php


namespace Nemundo\Content\Type;


use Nemundo\Content\Data\ContentType\ContentTypeCount;
use Nemundo\Content\Data\ContentView\ContentViewReader;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Content\Form\AbstractContentFormPart;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Model\Row\AbstractModelDataRow;
use Nemundo\Web\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;

// AbstractContentType
abstract class AbstractType extends AbstractBaseClass
{

    use EventTrait;

    /**
     * @var string
     */
    public $typeId;

    /**
     * @var string|string[]
     */
    public $typeLabel;
// protected


    /**
     * @var string
     */
    protected $dataId;
    // --> private???
    // not possible, da der Wert in onCreate gesetzt wird

    /**
     * @var bool
     */
    private $createMode = true;

    /**
     * @var string
     */
    //protected $formClass;

    /**
     * @var string
     */
    protected $formPartClass;


    /**
     * @var string
     */
    //protected $searchFormClass;

    /**
     * @var string
     */
    //protected $viewClass;

    /**
     * @var string[]
     */
    protected $viewClassList = [];

    /**
     * @var string[]
     */
    protected $formClassList = [];

    /**
     * @var AbstractModelDataRow
     */
    protected $dataRow;

    /**
     * @var AbstractSite
     */
    protected $viewSite;
    // site

    /**
     * @var string
     */
    protected $parameterClass;

    /**
     * @var bool
     */
    //protected $restrictedGroup = false;


    /**
     * @var bool
     */
    protected $deletable = true;


    // loadType
    abstract protected function loadContentType();

    public function __construct($dataId = null)
    {

        // $this->listingClass=ContentListing::class;

        $this->loadContentType();
        $this->fromDataId($dataId);

    }


    public function fromDataId($dataId = null)
    {

        if ($dataId !== null) {
            $this->dataId = $dataId;
            $this->createMode = false;
        }

        return $this;

    }


    public function getTypeLabel()
    {
        return $this->typeLabel;
    }


    public function getDataId()
    {

        return $this->dataId;

    }


    public function fromDataRow(AbstractModelDataRow $dataRow)
    {

        $this->dataRow = $dataRow;
        $this->fromDataId($dataRow->id);

        return $this;

    }


    protected function onDataRow()
    {
        //(new LogMessage())->writeError('getDataRow not defined'.$this->getClassName());
    }


    public function getDataRow()
    {

        if ($this->dataRow == null) {
            $this->onDataRow();
        }

        return $this->dataRow;

    }


    protected function onCreate()
    {

    }


    protected function onUpdate()
    {

        $this->onCreate();

    }


    protected function onIndex()
    {

    }


    public function saveIndex()
    {

        $this->onDataRow();
        $this->onIndex();

    }


    protected function saveData()
    {

        if (!$this->existItem()) {
            $this->onCreate();
        } else {
            $this->onUpdate();
        }

    }


    public function saveType()
    {

        $this->saveData();

    }


    public function hasForm()
    {
        $value = false;
        /*if ($this->formClass !== null) {
            $value = true;
        }*/

        if (isset($this->formClassList[0])) {
            $value = true;
        }

        return $value;
    }


    public function getDefaultForm(AbstractContainer $parent = null)
    {

        $form = null;

        if (isset($this->formClassList[0])) {

            /** @var AbstractContentForm $form */
            $form = new $this->formClassList[0]($parent);
            $form->contentType = $this;

        } else {

            /*if ($this->formClassList[] == null) {
                (new LogMessage())->writeError('No Form' . $this->getClassName());
            }*/

            if ($this->hasForm()) {

                /** @var AbstractContentForm $form */
                $form = new $this->formClass($parent);
                $form->contentType = $this;

            }

        }

        return $form;

    }


    public function hasFormPart() {

        $value=false;

        if ($this->formPartClass!==null) {
            $value=true;
        }

        return $value;

    }


    public function getFormPart(AbstractContainer $parent = null)
    {

        /** @var AbstractContentFormPart $formPart */
        $formPart = new $this->formPartClass($parent);
        $formPart->contentType = $this;

        return $formPart;

    }


    public function getFormList()
    {

        /** @var AbstractContentForm[] $list */
        $list = [];

        foreach ($this->formClassList as $formClass) {

            /** @var AbstractContentForm $form */
            $form = new $formClass();
            $form->contentType = $this;

            $list[] = $form;

        }

        if (sizeof($list) == 0) {
            $list[] = $this->getDefaultForm();
        }

        return $list;

    }


    /*
    public function getSearchForm(AbstractContainer $parent)
    {

        /* if ($this->formClassList[] == null) {
             (new LogMessage())->writeError('No Form' . $this->getClassName());
         }*/

    /** @var AbstractContentSearchForm $form */
    /*  $form = new $this->searchFormClass($parent);
      $form->contentType = $this;

      return $form;

  }*/


    /* public function hasSearchForm()
     {
         $value = false;
         if ($this->searchFormClass !== null) {
             $value = true;
         }
         return $value;
     }*/


    public function isEditable()
    {

        return $this->hasForm();

    }


    public function isDeletable()
    {

        return $this->deletable;

    }


    // hasDefaultView
    public function hasView()
    {

        $value = false;
        /*if ($this->viewClassList[]  !== null) {
            $value = true;
        }*/

        if (sizeof($this->viewClassList) > 0) {
            $value = true;
        }

        return $value;

    }


    public function getDefaultView(AbstractContainer $parent = null)
    {

        $view = null;


        $reader = new ContentViewReader();
        $reader->filter->andEqual($reader->model->contentTypeId, $this->typeId);
        $reader->filter->andEqual($reader->model->defaultView, true);
        $reader->limit = 1;
        foreach ($reader->getData() as $viewRow) {

            //$viewClass = $viewRow->viewClass;

            /** @var AbstractContentView $view */
            $view = new $viewRow->viewClass($parent);
            $view->contentType = $this;

        }


        /*
        if (isset($this->viewClassList[0])) {

            /** @var AbstractContentView $view */
        /*    $view = new $this->viewClassList[0]($parent);
            $view->contentType = $this;

        }*/

        /*else {

            /** @var AbstractContentView $view */
        /*    $view = null;
            if ($this->hasView()) {

                /** @var AbstractContentView $view */
        /*        $view = new $this->viewClass($parent);
                $view->contentType = $this;

            } else {

                $view = new Paragraph($parent);
                $view->content = '[No View]';

            }

        }*/

        return $view;

    }


    public function getDefaultViewId()
    {

        $viewId = null;

        $reader = new ContentViewReader();
        $reader->filter->andEqual($reader->model->contentTypeId, $this->typeId);
        $reader->filter->andEqual($reader->model->defaultView, true);
        $reader->limit = 1;
        foreach ($reader->getData() as $viewRow) {
            $viewId = $viewRow->id;
        }

        if ($viewId == null) {

            $reader = new ContentViewReader();
            $reader->filter->andEqual($reader->model->contentTypeId, $this->typeId);
            $reader->limit = 1;
            foreach ($reader->getData() as $viewRow) {
                $viewId = $viewRow->id;
            }


        }


        return $viewId;

    }


    public function getView($viewId, AbstractContainer $parent = null)
    {


        $viewRow = (new ContentViewReader())->getRowById($viewId);

        $class = $viewRow->viewClass;

        /** @var AbstractContentView $view */
        $view = new $class($parent);
        $view->contentType = $this;

        return $view;

    }


    // getViewLisitng
    public function getViewList()
    {

        /** @var AbstractContentView[] $list */
        $list = [];

        foreach ($this->viewClassList as $viewClass) {

            /** @var AbstractContentView $view */
            $view = new $viewClass();
            $view->contentType = $this;

            $list[] = $view;

        }

        return $list;

    }


    // hasSite
    public function hasViewSite()
    {

        $value = false;
        if ($this->viewSite !== null) {
            $value = true;
        }

        return $value;

    }


    public function getSubjectViewSite()
    {

        $site = $this->getViewSite();
        $site->title = $this->getSubject();

        return $site;

    }


    public function getViewSite()
    {

        $site = null;

        if ($this->viewSite !== null) {
            $site = clone($this->viewSite);

            if ($this->parameterClass !== null) {
                $site->addParameter($this->getParameter());
            }
        }

        return $site;

    }


    public function getParameter()
    {

        $parameter = null;
        if ($this->parameterClass !== null) {
            /** @var AbstractUrlParameter $parameter */
            $parameter = new $this->parameterClass($this->getDataId());
        }

        return $parameter;

    }


    protected function onDelete()
    {

    }


    public function deleteType()
    {

        $this->onDelete();

    }


    // existsItem
    public function existItem()
    {

        return !$this->createMode;

    }


    public function isInstalled()
    {

        $value = false;

        $count = new ContentTypeCount();
        $count->filter->andEqual($count->model->id, $this->typeId);
        if ($count->getCount() == 1) {
            $value = true;
        }

        return $value;

    }


    /*
    public function addEvent(AbstractContentEvent $contentEvent)
    {

        $this->eventList[] = $contentEvent;
        return $this;

    }*/


}