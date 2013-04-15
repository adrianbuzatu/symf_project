<?php

namespace Xivic\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class XivicUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
