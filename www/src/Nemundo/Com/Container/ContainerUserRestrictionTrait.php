<?php

namespace Nemundo\Com\Container;


use Nemundo\User\Access\UserRestrictionTrait;


trait ContainerUserRestrictionTrait
{

    use UserRestrictionTrait;


    protected function checkContainerVisibility()
    {

        if ($this->visible) {
            $this->visible = $this->checkUserVisibility();
        }

    }

}