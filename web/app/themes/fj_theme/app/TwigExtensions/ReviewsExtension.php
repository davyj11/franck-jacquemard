<?php


namespace App\TwigExtensions;

use App\PostTypes\Testimony;
use Timber\Timber;
use Twig\Extension\AbstractExtension;
use Rareloop\Lumberjack\Post;

class ReviewsExtension extends AbstractExtension
{
    /**
     * Adds functionality to Twig.
     *
     * @param \Twig\Environment $twig The Twig environment.
     * @return \Twig\Environment
     */
    public static function register($twig)
    {
        $twig->addFunction(new \Timber\Twig_Function("getAllReviews", [__CLASS__, 'getAllReviews']));
        return $twig;
    }

    public static function getAllReviews()
    {

        $lastReviews = Testimony::builder()->limit(-1)->get();


        return $lastReviews;
    }
}
