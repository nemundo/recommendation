<?php
namespace Nemundo\Db\Provider\MySql\Field;


use Nemundo\Core\Base\DataSource\AbstractDataSource;

class MySqlFieldTypeReader extends AbstractDataSource
{

    protected function loadData()
    {

        $reflection = new \ReflectionClass(MySqlFieldType::class);

        foreach ($reflection->getConstants() as $constant) {
            $this->addItem($constant);
        }

    }

}