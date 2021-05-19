<?php

namespace Nemundo\Content\App\Camera\Content\Camera;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Content\App\Camera\Parameter\CameraParameter;
use Nemundo\Content\App\Camera\Site\ImageDownloadSite;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class CameraContentView extends AbstractContentView
{
    /**
     * @var CameraContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName = 'default';
        $this->viewId = '862cb51f-6a24-425a-9b94-bfc077394b23';
        $this->defaultView = true;

    }

    public function getContent()
    {


        $cameraRow = $this->contentType->getDataRow();

        $img = new BootstrapResponsiveImage($this);
        $img->src = $cameraRow->image->getImageUrl($cameraRow->model->imageAutoSize1200);   // $cameraRow->image->getUrl();
        //$img->width = 300;

        //$table = new AdminLabelValueTable($this);
        //$table->addLabelValue('Camera', $cameraRow->camera);

        $btn=new AdminIconSiteButton($this);
        $btn->site=clone(ImageDownloadSite::$site);
        $btn->site->addParameter(new CameraParameter($cameraRow->id));

        return parent::getContent();
    }
}