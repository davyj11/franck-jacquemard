<?php

namespace App\TwigExtensions;

use Twig\Environment;
use Twig\Extension\AbstractExtension;

/**
 * Class LinkTwigExtension
 * @package App\TwigExtensions
 */
class LinkTwigExtension extends AbstractExtension
{
    /**
     * Adds functionality to Twig.
     *
     * @param Environment $twig The Twig environment.
     * @return Environment
     */
    public static function register($twig)
    {
        $twig->addFunction(new \Timber\Twig_Function("link", [__CLASS__, 'handle']));

        return $twig;
    }

    public static function handle($post)
    {
        return get_permalink($post);
    }
}
