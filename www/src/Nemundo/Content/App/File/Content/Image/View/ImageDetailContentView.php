<?php

namespace Nemundo\Content\App\File\Content\Image\View;

use Nemundo\Admin\Com\Button\AdminUrlButton;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Content\App\File\Content\Image\ImageContentType;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class ImageDetailContentView extends AbstractContentView
{
    /**
     * @var ImageContentType
     */
    public $contentType;


    protected function loadView()
    {

        $this->viewName='Detail View';
        $this->viewId='de52c8a6-729b-43a9-9182-1c6f1d4a9d6f';
        $this->defaultView=false;

    }

    public function getContent()
    {

        $imageRow = $this->contentType->getDataRow();

        $img = new BootstrapResponsiveImage($this);
        $img->src = $imageRow->image->getImageUrl($imageRow->model->imageAutoSize400);

        $table = new AdminLabelValueTable($this);
        $table->addLabelValue('Width',$imageRow->imageWidth);
        $table->addLabelValue('Height',$imageRow->imageHeight);

        $btn = new AdminUrlButton($this);
        $btn->content = 'Download';
        $btn->url = $imageRow->image->getUrl();
        $btn->download = true;


        return parent::getContent();
    }
}