<?php

namespace Nemundo\Content\App\Webcam\Content\Webcam;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Formatting\Small;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class WebcamContentView extends AbstractContentView
{
    /**
     * @var WebcamContentType
     */
    public $contentType;

    protected function loadView()
    {
        // TODO: Implement loadView() method.
    }

    public function getContent()
    {

        $webcamRow = $this->contentType->getDataRow();

        /*$h2=new H2($this);
        $h2->content=$webcamRow->webcam;*/

        $row = new BootstrapRow($this);


        $img = new BootstrapResponsiveImage($row);
        $img->src = $webcamRow->imageUrl;


        if ($webcamRow->sourceUrl !== '') {

            $row = new BootstrapRow($this);

            $small = new Small($row);
            $small->content = 'Quelle: ' . $webcamRow->sourceUrl;
        }

        return parent::getContent();

    }

}