<?php

namespace Nemundo\Content\App\Translation\Content\Language;

use Nemundo\Content\App\Translation\Data\Language\Language;
use Nemundo\Content\App\Translation\Data\Language\LanguageCount;
use Nemundo\Content\App\Translation\Data\Language\LanguageDelete;
use Nemundo\Content\App\Translation\Data\Language\LanguageId;
use Nemundo\Content\App\Translation\Data\Language\LanguageReader;
use Nemundo\Content\App\Translation\Data\Language\LanguageRow;
use Nemundo\Content\App\Translation\Data\Language\LanguageUpdate;
use Nemundo\Content\App\Translation\Data\TextTranslation\TextTranslationDelete;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Db\Sql\Order\SortOrder;

class LanguageContentType extends AbstractContentType
{

    public $code;

    public $language;

    /**
     * @var bool
     */
    public $defaultLanguage = false;

    protected function loadContentType()
    {
        $this->typeLabel = 'Language';
        $this->typeId = '3823ce64-871f-4502-b41a-127e2a38beef';
        $this->formClassList[] = LanguageContentForm::class;
        $this->listingClass = LanguageContentListing::class;
        $this->adminClass = LanguageContentAdmin::class;

    }


    public function fromCode($code) {

        $reader=new LanguageReader();
        $reader->filter->andEqual($reader->model->code,$code);
        foreach ($reader->getData() as $languageRow) {

            /*$this->languageId=$languageRow->id;
            $this->code=$languageRow->code;
            $this->language=$languageRow->language;
*/

            $this->fromDataId($languageRow->id);


        }

        if ($reader->getCount() == 0) {
            (new LogMessage())->writeError('No Language found. Code: '.$code);
        }


        return $this;

    }



    protected function onCreate()
    {

        $data = new Language();
        $data->code = $this->code;
        $data->language = $this->language;
        $data->defaultLanguage = $this->defaultLanguage;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {

        $update = new LanguageUpdate();
        $update->code = $this->code;
        $update->language = $this->language;
        $update->defaultLanguage = $this->defaultLanguage;
        $update->updateById($this->dataId);

    }

    protected function onDelete()
    {

        $languageRow=$this->getDataRow();
        if ($languageRow->defaultLanguage) {
            (new Debug())->write('Not allowed to delete default language.');
            exit;
        }


        $delete = new TextTranslationDelete();
        $delete->filter->andEqual($delete->model->languageId,$this->getDataId());
        $delete->delete();

        (new LanguageDelete())->deleteById($this->getDataId());

    }


    protected function onIndex()
    {
    }

    protected function onDataRow()
    {
        $this->dataRow = (new LanguageReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|LanguageRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    /*
    public function existItem()
    {

        $value = false;

        $count = new LanguageCount();
        $count->filter->andEqual($count->model->code,$this->code);
        if ($count->getCount() == 1) {

            $value=true;

            $id = new LanguageId();
            $id->filter->andEqual($count->model->code,$this->code);
            $this->dataId=$id->getId();

        }

        return $value;

    }*/



    public function getDataReader()
    {

        $reader = new LanguageReader();
        $reader->addOrder($reader->model->defaultLanguage,SortOrder::DESCENDING);
        $reader->addOrder($reader->model->language);
        return $reader->getData();

    }

}