<?php

namespace Nemundo\Model\Definition\Model;


use Nemundo\Model\Type\File\FileType;
use Nemundo\Model\Type\Id\UniqueIdType;

class MultiFileModel extends AbstractModel
{

    /**
     * @var FileType
     */
    public $file;

    /**
     * @var UniqueIdType
     */
    public $externalId;

    protected function loadModel()
    {

        $this->file = new FileType($this);
        $this->file->fieldName = 'file';
        $this->file->aliasFieldName = 'file';

        $this->externalId = new UniqueIdType($this);
        $this->externalId->fieldName = 'external_id';

    }

}