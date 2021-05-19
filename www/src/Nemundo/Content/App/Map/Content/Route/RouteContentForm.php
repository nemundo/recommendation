<?php

namespace Nemundo\Content\App\Map\Content\Route;

use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Core\Debug\Debug;
use Nemundo\Geo\Kml\Color\KmlColorConverter;
use Nemundo\Package\Bootstrap\FormElement\BootstrapColorPicker;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class RouteContentForm extends AbstractContentForm
{
    /**
     * @var RouteContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $route;

    /**
     * @var BootstrapColorPicker
     */
    private $color;

    /**
     * @var BootstrapFileUpload
     */
    private $file;


    public function getContent()
    {

        $this->route = new BootstrapTextBox($this);
        $this->route->label = 'Route';
        //$this->route->validation = true;

        $this->color=new BootstrapColorPicker($this);
        $this->color->label='Color';


        $this->file = new BootstrapFileUpload($this);
        $this->file->label = 'File';
        $this->file->acceptFileType = '.gpx';
        //$this->file->validation = true;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $routeRow = $this->contentType->getDataRow();

        $this->route->value=$routeRow->route;
        $this->color->value= $routeRow->color;


    }


    public function onSubmit()
    {

        $this->contentType->route = $this->route->getValue();
        $this->contentType->file->fromFileRequest($this->file->getFileRequest());
        $this->contentType->color= (new KmlColorConverter())->fromHex( $this->color->getValue());
        $this->contentType->saveType();

    }
}