<?php
// File : app/TwigExtensions/BookISBNTwigExtension.php
namespace App\TwigExtensions;

use App\Services\AssetPathResolver;
use Twig\Extension\AbstractExtension;

/**
 * Class BookISBNTwigExtension
 * @package App\TwigExtensions
 */
class EncoreExtension extends AbstractExtension
{
    /**
     * Adds functionality to Twig.
     *
     * @param \Twig\Environment $twig The Twig environment.
     * @return \Twig\Environment
     */
    public static function register($twig)
    {
        $filters = [
            "encore_entry_js_files",
            "encore_entry_css_files",
            "encore_entry_script_tags",
            "encore_entry_link_tags",
            "asset"
        ];

        foreach ($filters as $f) {
            $twig->addFunction(new \Timber\Twig_Function($f, [
                AssetPathResolver::class,
                $f
            ]));
        }
        return $twig;
    }
    
}
