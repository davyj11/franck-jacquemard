<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'allowed_functions' => [
    ],
    'extensions' => [
        \App\TwigExtensions\TextExtension::class,
        \App\TwigExtensions\NewsExtension::class,
        \App\TwigExtensions\ClassesExtension::class,
        \App\TwigExtensions\GetOptionsExtension::class,
        \App\TwigExtensions\EncoreExtension::class,
        \App\TwigExtensions\ImageTwigExtension::class,
        \App\TwigExtensions\LinkTwigExtension::class,
    ],
];
