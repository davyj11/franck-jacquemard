<?php


namespace App\TwigExtensions;
use Timber\Timber;
use Timber\Post;
use Twig\Extension\AbstractExtension;

class GetTimberPostExtension extends AbstractExtension
{
    /**
     * Adds functionality to Twig.
     *
     * @param \Twig\Environment $twig The Twig environment.
     * @return \Twig\Environment
     */
    public static function register($twig)
    {
        $twig->addFunction( new \Timber\Twig_Function("getTimber" , [__CLASS__, 'getTimber'] ));
        return $twig;
    }

    public static function getTimber($id = null)
    {
        return new Post($id);
    }

}
