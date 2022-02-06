<?php


namespace App\TwigExtensions;

use Timber\Timber;
use Twig\Extension\AbstractExtension;
use Rareloop\Lumberjack\Post;

class NewsExtension extends AbstractExtension
{
    /**
     * Adds functionality to Twig.
     *
     * @param \Twig\Environment $twig The Twig environment.
     * @return \Twig\Environment
     */
    public static function register($twig)
    {
        $twig->addFunction(new \Timber\Twig_Function("getLastNews", [__CLASS__, 'getLastNews']));
        return $twig;
    }

    public static function getLastNews($customNews = null, $amount = 3, $termObject = null)
    {
        $currentPostId = get_the_ID();
        if ($customNews) {
            $lastNews = Timber::get_posts($customNews);
        } else {
            $taxQuery = [];
            if ($termObject) {
                $taxQuery[] = [
                    'taxonomy' => $termObject->taxonomy,
                    'field' => 'slug',
                    'terms' => $termObject->slug,
                ];
            }

            $lastNews = Post::builder()
                ->limit($amount)
                ->whereIdNotIn([$currentPostId])
                ->whereTaxonomies($taxQuery)
                ->orderBy('date', 'DESC')
                ->get();
        }

        return $lastNews;
    }
}
