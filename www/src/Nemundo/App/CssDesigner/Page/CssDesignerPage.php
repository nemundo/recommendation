<?php

namespace Nemundo\App\CssDesigner\Page;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\CssDesigner\Com\Form\StyleForm;
use Nemundo\App\CssDesigner\Com\Table\StyleTable;
use Nemundo\App\CssDesigner\Parameter\StyleParameter;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Html\Typography\Code;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapColorPicker;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapColumn;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class CssDesignerPage extends AbstractTemplateDocument
{
    public function getContent()
    {


        //$layout=new BootstrapThreeColumnLayout()

        $row = new BootstrapRow($this);

        $menuColumn=new BootstrapColumn($row);
        $menuColumn->columnWidth=2;

        $styleColumn=new BootstrapColumn($row);
        $styleColumn->columnWidth=10;


        $form=new StyleForm($menuColumn);

        new StyleTable($menuColumn);


        $parameter=new StyleParameter();
        if ($parameter->hasValue()) {


            $styleId=$parameter->getValue();

            $styleRow = $parameter->getStyleRow();

            $title=new AdminTitle($styleColumn);
            $title->content=$styleRow->style;


            $form=new BootstrapForm($styleColumn);

            $color=new BootstrapColorPicker($form);
            $color->label='Background Color';



            $code=new Code($styleColumn);
            $code->content = 'css style';






        }





        return parent::getContent();
    }
}