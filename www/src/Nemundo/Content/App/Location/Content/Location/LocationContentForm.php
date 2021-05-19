<?php

namespace Nemundo\Content\App\Location\Content\Location;

use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapGeoCoordinate;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;

class LocationContentForm extends AbstractContentForm
{
    /**
     * @var LocationContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox
     */
    private $location;

    /**
     * @var BootstrapLargeTextBox
     */
    private $description;

    /**
     * @var BootstrapGeoCoordinate
     */
    private $geoCoordinate;


    public function getContent()
    {

        $this->location = new BootstrapTextBox($this);
        $this->location->label = 'Location';
        $this->location->validation = true;

        $this->description = new BootstrapLargeTextBox($this);
        $this->description->label = 'Description';

        $this->geoCoordinate = new BootstrapGeoCoordinate($this);

        return parent::getContent();

    }


    public function onSubmit()
    {

        $this->contentType->location = $this->location->getValue();
        $this->contentType->description = $this->description->getValue();
        $this->contentType->geoCoordinate = $this->geoCoordinate->getGeoCoordinate();
        $this->contentType->saveType();

    }

}