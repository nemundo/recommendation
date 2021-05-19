<?php


namespace Nemundo\Core\Base;


use Nemundo\Core\Random\UniqueId;


// braucht es wo???

abstract class AbstractItem extends AbstractBase
{

    /**
     * @var string
     */
    protected $id;

    // dataId


    private $createMode = false;

    public function __construct($id=null)
    {

        if ($id == null) {
            $this->id = (new UniqueId())->getUniqueId();
            $this->createMode=true;
        } else {

            $this->id = $id;
            $this->loadData();

        }


    }


    protected function loadData() {

    }


    abstract protected function create();

    abstract protected function update();


    public function save() {

        if ($this->createMode ) {
            $this->create();
        } else {
            $this->update();
        }

    }


    public function getId() {
        return $this->id;
    }


}