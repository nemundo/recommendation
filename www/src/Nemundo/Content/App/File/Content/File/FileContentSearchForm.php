<?php


namespace Nemundo\Content\App\File\Content\File;


use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Content\App\File\Data\File\FileReader;
use Nemundo\Content\App\File\Data\ImageIndex\ImageIndexReader;
use Nemundo\Content\Builder\ContentBuilder;

use Nemundo\Content\Index\Tree\Com\Form\AbstractContentSearchForm;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Request\Post\PostRequest;
use Nemundo\Html\Form\Button\SubmitButton;
use Nemundo\Model\Type\File\FileType;
use Nemundo\Package\Bootstrap\Image\BootstrapResponsiveImage;

class FileContentSearchForm extends AbstractContentSearchForm
{


    protected $requestName = 'image_id';

    public function getContent()
    {

        $ul = new UnorderedList($this);

        $reader = new FileReader();
        foreach ($reader->getData() as $fileRow) {

            $btn = new SubmitButton($ul);
            $btn->name = $this->requestName;
            $btn->label =$fileRow->file->getFilename();
            $btn->value = $fileRow->id;

            //$img = new BootstrapResponsiveImage($btn);
            //$img->src = $fileRow->image->getImageUrl($reader->model->imageAutoSize200);

        }

        $this->submitButton->visible = false;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $value = (new PostRequest($this->requestName))->getValue();

        $contentType = new FileContentType($value);  // (new ContentBuilder())->getContent($value);
        $this->saveTree($contentType);

    }

}