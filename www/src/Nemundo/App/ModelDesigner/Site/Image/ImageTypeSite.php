<?php

namespace Nemundo\App\ModelDesigner\Site\Image;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\App\ModelDesigner\Com\Breadcrumb\ModelDesignerBreadcrumb;
use Nemundo\App\ModelDesigner\Com\Form\ImageTypeForm;
use Nemundo\App\ModelDesigner\Parameter\AppParameter;
use Nemundo\App\ModelDesigner\Parameter\FieldNameParameter;
use Nemundo\App\ModelDesigner\Parameter\ImageFormatParameter;
use Nemundo\App\ModelDesigner\Parameter\ImageSizeParameter;
use Nemundo\App\ModelDesigner\Parameter\ModelParameter;
use Nemundo\App\ModelDesigner\Parameter\ProjectParameter;
use Nemundo\App\ModelDesigner\Type\ImageModelDesignerType;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Model\Type\ImageFormat\AutoSizeModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixHeightModelImageFormat;
use Nemundo\Model\Type\ImageFormat\FixWidthModelModelImageFormat;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;

class ImageTypeSite extends AbstractEditIconSite
{

    /**
     * @var ImageTypeSite
     */
    public static $site;


    protected function loadSite()
    {

        $this->title = 'Image Edit';
        $this->url = 'image-field';
        $this->menuActive = false;

        ImageTypeSite::$site = $this;

        new ImageFormatDeleteSite($this);

    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $project = (new ProjectParameter())->getProject();
        $app = (new AppParameter())->getApp($project);
        $model = $app->getModelByTableName((new ModelParameter())->getValue());

        /** @var ImageModelDesignerType $type */
        $type = (new FieldNameParameter())->getType($model);

        $breadcrumb = new ModelDesignerBreadcrumb($page);
        $breadcrumb->addProject($project);
        $breadcrumb->addApp($app);
        $breadcrumb->addModel($model);
        $breadcrumb->addActiveItem($type->label);

        $layout = new BootstrapTwoColumnLayout($page);

        $form = new ImageTypeForm($layout->col1);
        $form->app = $app;
        $form->type = $type;
        $form->redirectSite = ImageTypeSite::$site;
        $form->redirectSite->addParameter(new ProjectParameter());
        $form->redirectSite->addParameter(new AppParameter());
        $form->redirectSite->addParameter(new ModelParameter());
        $form->redirectSite->addParameter(new FieldNameParameter());


        $table = new AdminTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText('Type');
        $header->addText('Size');
        $header->addEmpty();

        foreach ($type->getFormatList() as $imageFormat) {

            $row = new TableRow($table);
            $row->addText($imageFormat->imageFormatLabel);


            if ($imageFormat->isObjectOfClass(AutoSizeModelImageFormat::class)) {
                $row->addText('Auto: '.$imageFormat->size);
            }

            if ($imageFormat->isObjectOfClass(FixWidthModelModelImageFormat::class)) {
                $row->addText('Width: '.$imageFormat->width);
            }

            if ($imageFormat->isObjectOfClass(FixHeightModelImageFormat::class)) {
                $row->addText('Height: '.$imageFormat->height);
            }

            $site = clone(ImageFormatDeleteSite::$site);
            $site->addParameter(new ProjectParameter());
            $site->addParameter(new AppParameter());
            $site->addParameter(new ModelParameter());
            $site->addParameter(new FieldNameParameter());
            $site->addParameter(new ImageFormatParameter($imageFormat->imageFormatName));
            $site->addParameter(new ImageSizeParameter($imageFormat->size));
            $row->addIconSite($site);

        }

        $page->render();

    }

}