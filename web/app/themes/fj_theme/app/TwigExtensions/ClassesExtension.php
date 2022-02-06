<?php


namespace App\TwigExtensions;
use Timber\Timber;
use Twig\Extension\AbstractExtension;
use Rareloop\Lumberjack\Post;

class ClassesExtension extends AbstractExtension
{
    /**
     * Adds functionality to Twig.
     *
     * @param \Twig\Environment $twig The Twig environment.
     * @return \Twig\Environment
     */
    public static function register($twig)
    {
        $twig->addFunction( new \Timber\Twig_Function("cls" , [__CLASS__, 'handleClasses'] ));
        return $twig;
    }

    public static function handleClasses($input, $exclude = "")
    {
        $baseExcludedClassNames = [
            "undefined",
            "false",
            "null"
        ];

        $excludedClassNames = array_merge($baseExcludedClassNames, array_diff(explode(" ", $exclude), [""]));

        $replaced = preg_replace("/\s+/m", " ", $input);
        $exploded = explode(" ", $replaced);
        $filtered = array_filter($exploded, function ($v) use ($excludedClassNames) {
            return !in_array($v, $excludedClassNames);
        });
        $joined = implode(" ", $filtered);

        return trim($joined);
    }

}