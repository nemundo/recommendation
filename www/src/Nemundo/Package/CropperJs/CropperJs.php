<?php

namespace Nemundo\Package\CropperJs;

use Nemundo\Com\FormBuilder\Item\HiddenFormItem;
use Nemundo\Core\Image\Cropping\CroppingDimension;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Com\Container\LibraryTrait;
use Nemundo\Html\Image\Img;
use Nemundo\Html\Form\Input\HiddenInput;
use Nemundo\Html\Script\JavaScript;

class CropperJs extends AbstractHtmlContainer
{

    use LibraryTrait;

    /**
     * @var string
     */
    public $imageUrl;

    /**
     * @var CroppingDimension
     */
    public $croppingDimension;

    /**
     * @var int
     */
    public $aspectRatioWidth = 1;

    /**
     * @var int
     */
    public $aspectRatioHeight = 1;

    /**
     * @var HiddenInput
     */
    private $inputX;

    /**
     * @var HiddenInput
     */
    private $inputY;

    /**
     * @var HiddenInput
     */
    private $inputWidth;

    /**
     * @var HiddenInput
     */
    private $inputHeight;


    protected function loadContainer()
    {

        parent::loadContainer();
        $this->croppingDimension = new CroppingDimension();

    }


    public function __construct(AbstractHtmlContainer $parentContainer = null)
    {

        parent::__construct($parentContainer);

        $this->inputX = new HiddenFormItem($this);
        $this->inputX->name = 'input_x';
        $this->inputX->id = 'input_x';

        $this->inputY = new HiddenFormItem($this);
        $this->inputY->name = 'input_y';
        $this->inputY->id = 'input_y';

        $this->inputWidth = new HiddenFormItem($this);
        $this->inputWidth->name = 'input_width';
        $this->inputWidth->id = 'input_width';

        $this->inputHeight = new HiddenFormItem($this);
        $this->inputHeight->name = 'input_height';
        $this->inputHeight->id = 'input_height';

    }


    public function getContent()
    {

        $this->addPackage(new CropperJsPackage());

        $this->tagName = 'div';

        $img = new Img($this);
        $img->id = 'image';
        $img->addAttribute('style', 'max-width: 100%;');
        $img->src = $this->imageUrl;

        $script = new JavaScript($this);
        $script->addCodeLine('window.addEventListener("DOMContentLoaded", function () {');
        $script->addCodeLine('var image = document.getElementById("image");');
        $script->addCodeLine('var cropper = new Cropper(image, {');
        $script->addCodeLine('aspectRatio: ' . $this->aspectRatioWidth . ' / ' . $this->aspectRatioHeight . ',');

        $script->addCodeLine('data: {');
        $script->addCodeLine('x: ' . $this->croppingDimension->x . ',');
        $script->addCodeLine('y: ' . $this->croppingDimension->y . ',');
        $script->addCodeLine('width: ' . $this->croppingDimension->width . ',');
        $script->addCodeLine('height: ' . $this->croppingDimension->height . ',');
        $script->addCodeLine('},');

        $script->addCodeLine('crop: function(e) {');
        $script->addCodeLine('document.getElementById("input_x").value = e.detail.x;');
        $script->addCodeLine('document.getElementById("input_y").value = e.detail.y;');
        $script->addCodeLine('document.getElementById("input_width").value = e.detail.width;');
        $script->addCodeLine('document.getElementById("input_height").value = e.detail.height;');
        $script->addCodeLine('}');
        $script->addCodeLine('});');
        $script->addCodeLine('});');

        return parent::getContent();

    }


    public function getCroppingDimension()
    {

        $dimension = new CroppingDimension();
        $dimension->x = $this->inputX->getPostValue();
        $dimension->y = $this->inputY->getPostValue();
        $dimension->width = $this->inputWidth->getPostValue();
        $dimension->height = $this->inputHeight->getPostValue();

        return $dimension;

    }

}