<?php

namespace Nemundo\Package\Bootstrap\Dropdown;

use Nemundo\Com\Html\Hyperlink\UrlHyperlink;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Button\Button;
use Nemundo\Html\Formatting\Italic;
use Nemundo\Package\Bootstrap\Icon\BootstrapIcon;

class BootstrapDropdown extends Div
{

    /**
     * @var string
     */
    public $label;

    /**
     * @var Button
     */
    public $dropdownButton;

    /**
     * @var bool
     */
    public $showToggle=true;

    /**
     * @var Div
     */
    protected $dropdownDiv;


    public $icon = 'btn';

    /**
     * @var Italic
     */
    private $italic;


    protected function loadContainer()
    {

        parent::loadContainer();

        $this->addCssClass('dropdown');

        $this->dropdownButton = new Button($this);
        $this->dropdownButton->id = 'dropdownMenuButton';
        $this->dropdownButton->addAttribute('data-bs-toggle', 'dropdown');
        $this->dropdownButton->addAttribute('aria-haspopup', 'true');
        $this->dropdownButton->addAttribute('aria-expanded', 'false');
        $this->dropdownButton->addCssClass('btn');

//$this->dropdownButton->addCssClass('bi bi-plus');

        //$icon = new BootstrapIcon($dropdown);
        //$icon->icon = 'plus';

        $this->italic = new Italic($this->dropdownButton);
        //$i->addCssClass('fa fa-plus');



        //$this->dropdownButton->addCssClass('btn dropdown-toggle');


//        $this->dropdownButton->addCssClass('btn btn-primary dropdown-toggle');


        /*
        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
        */



        $this->dropdownDiv = new Div($this);
        $this->dropdownDiv->addAttribute('aria-labelledby', 'dropdownMenuButton');
        $this->dropdownDiv->addCssClass('dropdown-menu');

    }


    public function addItem($label, $url)
    {

        $this->dropdownButton->addCssClass($this->icon);


        $hyperlink = new UrlHyperlink($this->dropdownDiv);
        $hyperlink->addCssClass('dropdown-item');
        $hyperlink->content = $label;
        $hyperlink->url = $url;

        return $this;

    }


    public function addSeperator()
    {
        $div = new Div($this->dropdownDiv);
        $div->addCssClass('dropdown-divider');
    }


    public function getContent()
    {

        $this->dropdownButton->label = $this->label;


        $this->italic->addCssClass($this->icon);


        if ($this->showToggle) {
            $this->dropdownButton->addCssClass('btn-primary dropdown-toggle');
        }

        return parent::getContent();
    }

}