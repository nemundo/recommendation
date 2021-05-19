<?php


namespace Nemundo\Package\BootstrapDropdown;


use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Button\Button;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Jquery\Code\JqueryReadyCode;
use Nemundo\Web\Site\AbstractSite;

class BootstrapSubmenuDropdown extends AbstractHtmlContainer
{

    use LibraryTrait;


    /**
     * @var AbstractSite[]
     */
    private $siteList = [];

    /**
     * @var Submenu[]
     */
    private $submenutList = [];


    public function addSite(AbstractSite $site)
    {

        $this->siteList[] = $site;
        return $this;

    }


    public function addSubmenu(Submenu $submenu)
    {

        $this->submenutList[] = $submenu;
        return $this;

    }


    public function getContent()
    {

        $this->addPackage(new BootstrapDropdownPackage());

        $ready = new JqueryReadyCode($this);
        $ready->addCodeLine('$("[data-submenu]").submenupicker();');

        $div = new Div($this);
        $div->addCssClass('dropdown');

        $dropdownDiv = new Div($div);
        $dropdownDiv->addCssClass('dropdown-menu');

        $button = new Button($div);
        $button->label = 'Add ';
        $button->addCssClass('btn btn-secondary dropdown-toggle');
        $button->addAttribute('data-toggle', 'dropdown');
        $button->addAttributeWithoutValue('data-submenu');


        foreach ($this->siteList as $site) {


            $subDiv = new Div($dropdownDiv);
            $subDiv->addCssClass('dropdown dropdown-submenu');

            $button = new SiteHyperlink($subDiv); // new Button($subDiv);
            $button->addCssClass('dropdown-item');
            $button->site = $site;
            //$button->label= $site->title;

        }




        foreach ($this->submenutList as $submenu) {

            $subDiv = new Div($dropdownDiv);
            $subDiv->addCssClass('dropdown dropright dropdown-submenu');


            $button = new Button($subDiv);
            $button->addCssClass('dropdown-item dropdown-toggle');
            $button->label = $submenu->label;


            $subDiv2 = new Div($subDiv);
            $subDiv2->addCssClass('dropdown-menu');


            foreach ($submenu->getSiteList() as $site) {


                $button = new SiteHyperlink($subDiv2);
                $button->addCssClass('dropdown-item');
                $button->site = $site;

            }

        }


        /*
        $subDiv=new Div($dropdownDiv);
  $subDiv->addCssClass('dropdown dropright dropdown-submenu');

        $button=new Button($subDiv);
        $button->addCssClass('dropdown-item dropdown-toggle');
        $button->label='Sub Bla4';

        $subDiv2=new Div($subDiv);
        $subDiv2->addCssClass('dropdown-menu');

        $button=new Button($subDiv2);  // SiteHyperlink($subDiv2);
        //$button->site= new Site();
        //$button->site->title='sub Bla4 2';
        $button->addCssClass('dropdown-item');
        $button->label='123123';*/


        return parent::getContent();

    }

}