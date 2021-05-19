<?php


namespace Nemundo\Admin\Com\Choice;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Request\Get\GetRequest;
use Nemundo\Html\Form\Input\HiddenInput;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Web\Action\AbstractActionPanel;
use Nemundo\Web\Action\ActionSite;
use Nemundo\Web\Parameter\UrlParameter;
use Nemundo\Web\Parameter\UrlParameterList;

class AdminMultiChoiceList extends AbstractActionPanel
{

    /**
     * @var ActionSite
     */
    private $index;

    /**
     * @var ActionSite
     */
    private $add;

    /**
     * @var ActionSite
     */
    private $delete;

    /**
     * @var ActionSite
     */
    private $clear;


    private $valueList = [];

    /**
     * @var UrlParameter
     */
    private $choiceIdParameter;

    public function addValue($id, $label)
    {

        $this->valueList[$id] = $label;
        return $this;

    }


    public function getValueList()
    {

        $parameterList = new UrlParameterList();
        $parameterList->parameterName = 'multi';
        return $parameterList->getValueList();

    }


    public function hasValue()
    {

        $parameterList = new UrlParameterList();
        $parameterList->parameterName = 'multi';
        return $parameterList->hasValue();

    }


    protected function loadActionSite()
    {

        $this->choiceIdParameter=new UrlParameter();
        $this->choiceIdParameter->parameterName='choice_add';

        $parameterList = new UrlParameterList();
        $parameterList->parameterName = 'multi';

        $this->index = new ActionSite($this);
        $this->index->actionName = 'index';
        $this->index->onAction = function () {

            $parameterList = new UrlParameterList();
            $parameterList->parameterName = 'multi';

            $site = clone($this->index);
            $site->title = 'Clear';
            $site->removeParameter($parameterList);
            $hyperlink = new SiteHyperlink($this);
            $hyperlink->site = $site;

            $form = new SearchForm($this);

            foreach ($parameterList->getValueList() as $value) {
                $hidden = new HiddenInput($form);
                $hidden->name = 'multi[]';
                $hidden->value = $value;
            }

            $hidden = new HiddenInput($form);
            $hidden->name = $this->actionParameterName;
            $hidden->value = $this->add->actionName;

            $listbox = new BootstrapListBox($form);
            $listbox->name = 'choice_add';
            $listbox->submitOnChange = true;
            foreach ($this->valueList as $key => $value) {
                $listbox->addItem($key, $value);
            }

            $table = new AdminTable($this);

            foreach ($parameterList->getValueList() as $value) {

                $row = new TableRow($table);
                //$row->addText($value);
                $row->addText($this->valueList[$value]);

                $parameter = new UrlParameter($value);
                $parameter->parameterName = 'delete_id';

                $site = clone($this->delete);
                $site->addParameter($parameter);

                $hyperlink = new SiteHyperlink($row);
                $hyperlink->site = $site;

            }

        };


        $this->add = new ActionSite($this);
        $this->add->title = 'Add';
        $this->add->actionName = 'add';
        $this->add->onAction = function () {

            $parameterList = new UrlParameterList();
            $parameterList->parameterName = 'multi';
            $parameterList->addValue($this->choiceIdParameter->getValue());

            $site = clone($this->index);
            $site->addParameter($parameterList);
            $site->removeParameter($this->choiceIdParameter);
            $site->redirect();

        };


        $this->delete = new ActionSite($this);
        $this->delete->title = 'Delete';
        $this->delete->actionName = 'delete';
        $this->delete->onAction = function () {

            $parameter = new UrlParameter();
            $parameter->parameterName = 'delete_id';

            $parameterList = new UrlParameterList();
            $parameterList->parameterName = 'multi';
            $parameterList->removeValue($parameter->getValue());

            $site = clone($this->index);
            $site->addParameter($parameterList);
            $site->removeParameter($parameter);
            $site->redirect();

        };


        $this->clear = new ActionSite($this);
        $this->clear->title = 'Clear';
        $this->clear->actionName = 'clear';
        $this->clear->onAction = function () {

            $site = clone($this->index);
            $site->redirect();

        };


    }

}