<?php

namespace Nemundo\App\ModelDesigner\Collection;


use Nemundo\App\ModelDesigner\Type\ExternalModelDesignerType;
use Nemundo\App\ModelDesigner\Type\ImageModelDesignerType;
use Nemundo\App\ModelDesigner\Type\TextModelDesignerType;
use Nemundo\App\ModelDesigner\Type\VirtualExternalModelDesignerType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Sorting\SortingListOfObject;
use Nemundo\Core\Type\AbstractType;
use Nemundo\Model\Type\AbstractModelType;
use Nemundo\Orm\Type\DateTime\CreatedDateTimeOrmType;
use Nemundo\Orm\Type\DateTime\DateOrmType;
use Nemundo\Orm\Type\DateTime\DateTimeOrmType;
use Nemundo\Orm\Type\DateTime\ModifiedDateTimeOrmType;
use Nemundo\Orm\Type\DateTime\TimeOrmType;
use Nemundo\Orm\Type\File\FileOrmType;
use Nemundo\Orm\Type\File\ImageOrmType;
use Nemundo\Orm\Type\File\RedirectFilenameOrmType;
use Nemundo\Orm\Type\Geo\GeoCoordinateAltitudeOrmType;
use Nemundo\Orm\Type\Geo\GeoCoordinateOrmType;
use Nemundo\Orm\Type\Id\IdOrmType;
use Nemundo\Orm\Type\Number\DecimalNumberOrmType;
use Nemundo\Orm\Type\Number\NumberOrmType;
use Nemundo\Orm\Type\Number\YesNoOrmType;
use Nemundo\Orm\Type\Text\LargeTextOrmType;
use Nemundo\Orm\Type\Text\TextOrmType;
use Nemundo\Orm\Type\Text\TranslationTextOrmType;
use Nemundo\Orm\Type\User\CreatedUserOrmType;
use Nemundo\Orm\Type\User\UserOrmType;

// ModelTypeCollection
class TypeCollection extends AbstractBase
{

    /**
     * @var AbstractType[]|TextOrmType[]|ExternalModelDesignerType[]|ImageOrmType[]
     */
    private static $typeList = [];

    private static $loadedType = false;

    public static function addType(AbstractModelType $type)
    {

        TypeCollection::$typeList[] = $type;

    }

    public function loadDefaultType()
    {

    }


    /**
     * @return AbstractType[]|TextOrmType[]|ExternalModelDesignerType[]|VirtualExternalModelDesignerType[]|ImageOrmType[]
     */
    public function getTypeCollection()
    {

        if (!TypeCollection::$loadedType) {

            TypeCollection::addType(new TextModelDesignerType());
            TypeCollection::addType(new ExternalModelDesignerType());
            TypeCollection::addType(new VirtualExternalModelDesignerType());
            TypeCollection::addType(new ImageModelDesignerType());
            TypeCollection::addType(new LargeTextOrmType());
            TypeCollection::addType(new NumberOrmType());
            TypeCollection::addType(new YesNoOrmType());
            TypeCollection::addType(new DecimalNumberOrmType());
            TypeCollection::addType(new DateTimeOrmType());
            TypeCollection::addType(new DateOrmType());
            TypeCollection::addType(new TimeOrmType());
            TypeCollection::addType(new CreatedDateTimeOrmType());
            TypeCollection::addType(new ModifiedDateTimeOrmType());
            TypeCollection::addType(new GeoCoordinateOrmType());
            TypeCollection::addType(new GeoCoordinateAltitudeOrmType());
            TypeCollection::addType(new FileOrmType());
            TypeCollection::addType(new RedirectFilenameOrmType());
            TypeCollection::addType(new CreatedUserOrmType());
            TypeCollection::addType(new UserOrmType());
            TypeCollection::addType(new IdOrmType());

            TypeCollection::addType(new TranslationTextOrmType());

            TypeCollection::$loadedType = true;

        }

        $sorting = new SortingListOfObject();
        $sorting->objectList = TypeCollection::$typeList;
        $sorting->sortingProperty = 'typeLabel';
        $list = $sorting->getSortedListOfObject();

        return $list;

    }

}