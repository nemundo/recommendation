<?php


namespace Nemundo\App\Application\Script;


use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Model\Image\ModelImageResize;


// move to application

class ImageResizeScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'app-image-resize';
    }


    public function run()
    {


        $applicationReader = new ApplicationReader();
        $applicationReader->filter->andEqual($applicationReader->model->install, true);
        foreach ($applicationReader->getData() as $applicationRow) {

            $application = $applicationRow->getApplication();

            if ($application->hasModelCollection()) {


                foreach ($application->getModelCollection()->getModelList() as $model) {
                    (new ModelImageResize())->resizeModel($model);
                }


            }

            //if ($application->hasInstall()) {
            //  (new Debug())->write($application->application);


            //$application->reinstallApp()->setAppMenuActive();

            //}


        }


        /*

        $model = new CameraModel();  //  new ImageModel();

        $reader = new ModelDataReader();
        $reader->model = $model;
        foreach ($reader->getData() as $dataRow) {

            foreach ($model->getTypeList() as $type) {

                if ($type->isObjectOfClass(ImageType::class)) {

                    $image = new ImageReaderProperty($dataRow, $type);
                    $filenameOrginal = $image->getFullFilename();

                    $resize = new DataImageResize();
                    $resize->type = $type;
                    $resize->resizeImage($filenameOrginal);


                    /*

                    $image = new ImageReaderProperty($dataRow,$type);

                    foreach ($type->getFormatList() as $format) {
                        //(new Debug())->write($format->getPath());

                        //$carousel->addImage($imageRow->image->getImageUrl($imageReader->model->imageAutoSize1600));

                        //(new Debug())->write($image->getImageFullFilename($format));



                        $filenameOrginal = $image->getFullFilename();

                        $filename = $image->getImageFullFilename($format);
                        $file=new File($filename);

                        if ($file->notExists()) {

                            (new Debug())->write($filenameOrginal);
                            (new Debug())->write($filename);

                        }



                    }*/


//                }

        //          }


        //  }


    }

}