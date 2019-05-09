<?php

use App\Basics\Routing\BasicRoutingBundle;

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\WebServerBundle\WebServerBundle::class => ['dev' => true],
    BasicRoutingBundle::class => ['all' => true]
];
