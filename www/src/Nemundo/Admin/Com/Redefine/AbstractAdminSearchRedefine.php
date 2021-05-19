<?php

namespace Nemundo\Admin\Com\Redefine;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Parameter\RemoveParameter;
use Nemundo\Admin\Site\ParameterRemoveSite;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Core\Random\UniqueId;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Heading\H5;
use Nemundo\Package\Bootstrap\Listing\BootstrapBadge;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Web\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;


// to do
// more (z.B. Country)


// AdminRedefineCard
// AbstractRedefine
abstract class AbstractAdminSearchRedefine extends Div
{

    use LibraryTrait;

    public $searchLabel;

    public $searchResult;

    public $limit = 10;

    public $value;

    /**
     * @var bool
     */
    public $showAtStartup = true;

    /**
     * @var bool
     */
    public $hideIfEmpty = false;

    /**
     * @var bool
     */
    public $showClearButton = false;


    /**
     * @var AbstractSite
     */
    public static $site;

    /**
     * @var bool
     */
    public static $mobileVersion = false;


    /**
     * @var AbstractUrlParameter
     */
    protected $removeParameter;

    /**
     * @var AdminIconSiteButton
     */
    private $removeButton;

    /**
     * @var BootstrapHyperlinkList
     */
    private $hyperlinkList;

    /**
     * @var Div
     */
    private $titleDiv;

    /**
     * @var Div
     */
    private $contentDiv;

    /**
     * @var H5
     */
    private $h5;


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->addCssClass('list-group');
        $this->addCssClass('mb-3');

        $this->titleDiv = new Div($this);
        $this->titleDiv->addCssClass('list-group-item');
        $this->titleDiv->addCssClass('list-group-item-secondary');

        $this->h5 = new H5($this->titleDiv);

        $this->contentDiv = new Div($this);


    }


    public function getContent()
    {

        /*
        $this->hideAtStartup = AbstractRedefineCard::$mobileVersion;

        if ($this->flightReader->getCount() ==0) {
            $this->visible=false;
        }*/

        if ($this->id == null) {
            $this->id = 'card-' . (new UniqueId())->getUniqueId();
        }


        $this->h5->content = $this->searchLabel;

        if ($this->searchResult !== null) {
            $this->h5->content .= ': ' . $this->searchResult;
        }

        $this->titleDiv->id = $this->id . '-title';
        $this->contentDiv->id = $this->id . '-content';

        if ($this->showAtStartup) {
            $this->addStyle('#' . $this->contentDiv->id . ' {');
            $this->addStyle('display: none;');
            $this->addStyle('}');
        }

        $this->addJqueryScript('$("#' . $this->titleDiv->id . '").click(function(){');
        $this->addJqueryScript('$("#' . $this->contentDiv->id . '").toggle();');
        $this->addJqueryScript('});');


        if ($this->showClearButton) {
            $btn = new AdminIconSiteButton($this->titleDiv);
            $btn->site = clone(ParameterRemoveSite::$site);
            $btn->site->addParameter(new RemoveParameter($this->removeParameter->getParameterName()));
            $btn->site->icon->iconSize = 1;
        }

        return parent::getContent();

    }


    protected function addItemSite(AbstractSite $site, $count = 0)
    {

        $hyperlink = new SiteHyperlink($this->contentDiv);
        $hyperlink->addCssClass('list-group-item d-flex justify-content-between align-items-center list-group-item-action');
        $hyperlink->site = $site;

        $badge = new BootstrapBadge($hyperlink);
        $badge->content = (new Number($count))->formatNumber();

    }

}