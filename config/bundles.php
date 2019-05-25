<?php

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\WebServerBundle\WebServerBundle::class => ['dev' => true],
    Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle::class => ['all' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['all' => true],
    Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class => ['all' => true],
    Symfony\Bundle\MakerBundle\MakerBundle::class => ['dev' => true],
    App\Basics\Routing\BasicsRoutingBundle::class => ['all' => true],
    App\Basics\Console\BasicsConsoleBundle::class => ['all' => true],
    App\Basics\ORMBundle\BasicsORMBundle::class => ['all' => true],
    App\Basics\Crud\BasicsCrudBundle::class => ['all' => true],
    SamJ\FractalBundle\SamJFractalBundle::class => ['all' => true]
];
