<?php

namespace Nemundo\Content\App\Translation\Content\TranslationText;


use Nemundo\Content\App\Translation\Content\Language\LanguageContentType;
use Nemundo\Content\Form\AbstractContentFormPart;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;


// TextTranslationContentFormPart
class TranslationTextContentFormPart extends AbstractContentFormPart
{

    /**
     * @var TranslationTextContentType
     */
    public $contentType;

    /**
     * @var BootstrapTextBox[]
     */
    private $translation = [];

    protected function loadContainer()
    {

        parent::loadContainer();


        /*if ($this->label !== null) {
        $p = new Paragraph($this);
        $p->content = 'Label ...';  // $this->label;
        }*/

        foreach ((new LanguageContentType())->getDataReader() as $languageRow) {

            $formRow = new BootstrapRow($this);

            $this->translation[$languageRow->code] = new BootstrapTextBox($formRow);
            $this->translation[$languageRow->code]->label = $languageRow->getLabel();  // $label;

        }

    }


    public function getContent()
    {


        if ($this->contentType->getDataId() !== null) {

            foreach ((new LanguageContentType())->getDataReader() as $languageRow) {

                //$this->translation[$languageRow->code]->value = 'test';

                //$text = (new TranslationText())->getText($this->source, $languageRow->id, $this->sourceType->getId());

                $this->translation[$languageRow->code]->value = $this->contentType->getTranslationText($languageRow->id);

            }


        }


        /*
        if ($this->source !== null) {

            $p = new Paragraph($this);
            $p->content = 'Source: ' . $this->source;

            foreach ((new LanguageType())->getLanguageData() as $languageRow) {
                $this->translation[$languageRow->code]->value = 'test';

                $text = (new TranslationText())->getText($this->source, $languageRow->id, $this->sourceType->getId());
                $this->translation[$languageRow->code]->value = $text;

            }

        }*/

        return parent::getContent();

    }


    public function getTextList()
    {

        $text = [];
        foreach ((new LanguageContentType())->getDataReader() as $languageRow) {
            $text[$languageRow->code] = $this->translation[$languageRow->code]->getValue();
            //(new TranslationText())->saveText($languageRow->id, $source, $this->sourceType, $this->translation[$languageRow->code]->getValue());
        }

        return $text;

    }


    public function saveData()  //ranslation($source)
    {


        //$type = new \Nemundo\Content\App\Translation\Content\TranslationText\TranslationTextContentType();
        $this->contentType->text = $this->getTextList();
        $this->contentType->saveType();

        return $this->contentType->getDataId();


        //foreach ((new LanguageType())->getLanguageData() as $languageRow) {


        //(new TranslationText())->saveText($languageRow->id, $source, $this->sourceType, $this->translation[$languageRow->code]->getValue());

        //}

    }


}