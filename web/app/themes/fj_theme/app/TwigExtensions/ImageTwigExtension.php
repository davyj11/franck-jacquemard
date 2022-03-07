<?php

namespace App\TwigExtensions;

use Twig\Environment;
use Twig\Extension\AbstractExtension;

/**
 * Class ImageTwigExtension
 * @package App\TwigExtensions
 */
class ImageTwigExtension extends AbstractExtension
{
    /**
     * Adds functionality to Twig.
     *
     * @param Environment $twig The Twig environment.
     * @return Environment
     */
    public static function register($twig)
    {
        $twig->addFunction(new \Timber\Twig_Function("image", [__CLASS__, 'handle']));

        return $twig;
    }

    public static function handle($image, $size, $customClass = '', $customAlt = true, $loading= true)
    {

        $imageID = is_array($image) ? $image['ID'] : $image;


        $attr = array(
            'class' => $customClass,
        );

        if ($customAlt) {

            $nameBeautified = ucwords(str_replace('-', ' ', $image['name']));

            $attr['alt'] = $image['alt'] != "" ? $image['alt'] : $nameBeautified;
        }

        if (!$loading) {
            $attr['loading'] = false;
        }

        return wp_get_attachment_image($imageID, $size, false, $attr);
    }
}
