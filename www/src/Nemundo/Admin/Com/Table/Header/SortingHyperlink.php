<?php

namespace Nemundo\Admin\Com\Table\Header;


use Nemundo\Admin\Parameter\SortingParameter;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Html\Table\Th;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Model\Reader\AbstractModelDataReader;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Web\Site\Site;

// SortingHeaderHyperlink
class SortingHyperlink extends Th  // Hyperlink
{

    /**
     * @var AbstractModelType
     */
    public $fieldType;

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $sortOder = SortOrder::ASCENDING;

    public function getContent()
    {

        $this->nowrap = true;

        $hyperlink = new SiteHyperlink($this);  // new Hyperlink($this);

        $label = $this->label;
        if ($this->label == null) {
            $label = $this->fieldType->label;
            //$hyperlink->content = $this->fieldType->label;
        }
        $hyperlink->site = new Site();
        $hyperlink->site->addParameter(new SortingParameter($this->fieldType->fieldName));
        $hyperlink->site->title = $label;

        return parent::getContent();
    }


    public function checkSorting(AbstractModelDataReader $reader)
    {

        $sortingParameter = new SortingParameter();

        if ($sortingParameter->getValue() == $this->fieldType->fieldName) {
            $reader->addOrder($this->fieldType, $this->sortOder);
        }

    }

}