<?php

namespace Nemundo\Package\JqueryUi\Sortable;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Package\JqueryUi\JqueryUiPackage;
use Nemundo\Web\Site\AbstractSite;

class JquerySortableCode extends AbstractContainer
{

    use LibraryTrait;


    /**
     * @var string
     */
    public $sortableId;

    /**
     * @var AbstractSite
     */
    public $sortableSite;

    public function getContent()
    {

        $this->addPackage(new JqueryUiPackage());

        $this->addJqueryScript('$("#' . $this->sortableId . '").sortable({');

        $this->addJqueryScript('update : function () {');
        $this->addJqueryScript('var order = $("#' . $this->sortableId . '").sortable("serialize", {');
        $this->addJqueryScript('expression: /(.+)[_](.+)/,');
        $this->addJqueryScript('});');

        $this->addJqueryScript('$.ajax({');
        $this->addJqueryScript('type: "POST",');
        $this->addJqueryScript('url: "' . $this->sortableSite->getUrl() . '",');
        $this->addJqueryScript('data: order,');
        $this->addJqueryScript('datatype: "json",');
        $this->addJqueryScript('});');
        $this->addJqueryScript('}');
        $this->addJqueryScript('});');

        return parent::getContent();

    }

}