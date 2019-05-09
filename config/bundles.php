<?php

use App\Basics\Console\BasicsConsoleBundle;
use App\Basics\Routing\BasicsRoutingBundle;

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\WebServerBundle\WebServerBundle::class => ['dev' => true],
    BasicsRoutingBundle::class                            => ['all' => true],
    BasicsConsoleBundle::class                            => ['all' => true]
];
