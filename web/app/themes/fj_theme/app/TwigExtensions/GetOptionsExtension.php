<?php


namespace App\TwigExtensions;
use Timber\Timber;
use Twig\Extension\AbstractExtension;
use Rareloop\Lumberjack\Post;

class GetOptionsExtension extends AbstractExtension
{
    /**
     * Adds functionality to Twig.
     *
     * @param \Twig\Environment $twig The Twig environment.
     * @return \Twig\Environment
     */
    public static function register($twig)
    {
        $twig->addFunction( new \Timber\Twig_Function("getOptions" , [__CLASS__, 'getOptions'] ));
        return $twig;
    }

    public static function getOptions($field = null)
    {
        return get_field($field, 'options');
    }

}
