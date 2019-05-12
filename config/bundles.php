<?php

use App\Basics\ORMBundle\BasicsORMBundle;

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\WebServerBundle\WebServerBundle::class => ['dev' => true],
    Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle::class => ['all' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['all' => true],
    Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class => ['all' => true],
    Symfony\Bundle\MakerBundle\MakerBundle::class => ['dev' => true],
    App\Basics\Routing\BasicsRoutingBundle::class => ['all' => true],
    App\Basics\Console\BasicsConsoleBundle::class => ['all' => true],
    BasicsORMBundle::class => ['all' => true],
];
