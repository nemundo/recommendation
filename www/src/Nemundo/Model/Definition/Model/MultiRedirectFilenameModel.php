<?php

namespace Nemundo\Model\Definition\Model;

use Nemundo\Model\Type\File\RedirectFilenameType;
use Nemundo\Model\Type\Id\UniqueIdType;

class MultiRedirectFilenameModel extends AbstractModel
{

    /**
     * @var RedirectFilenameType
     */
    public $file;

    /**
     * @var UniqueIdType
     */
    public $externalId;

    protected function loadModel()
    {

        $this->id = new UniqueIdType($this);
        $this->id->fieldName = 'id';
        $this->id->aliasFieldName = 'id';

        $this->file = new RedirectFilenameType($this);
        $this->file->fieldName = 'file';

        $this->externalId = new UniqueIdType($this);
        $this->externalId->fieldName = 'external_id';

    }

}