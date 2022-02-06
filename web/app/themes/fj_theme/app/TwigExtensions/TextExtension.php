<?php
// File : app/TwigExtensions/BookISBNTwigExtension.php
namespace App\TwigExtensions;

use Twig\Extension\AbstractExtension;

/**
 * Class BookISBNTwigExtension
 * @package App\TwigExtensions
 */
class TextExtension extends AbstractExtension
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
            "truncatew",
            "titleCustom",
            "obfuscated",
            "fileSize"
        ];

        foreach ($filters as $f) {
            $twig->addFilter(new \Timber\Twig_Filter($f, [
                __CLASS__,
                $f
            ]));
        }
        return $twig;
    }

    public static function truncatew($string, $limit, $separator = '...')
    {
        if (mb_strlen($string) > $limit) {
            $newlimit = $limit - mb_strlen($separator);
            $s = mb_substr($string, 0, $newlimit + 1);

            return mb_substr($s, 0, mb_strrpos($s, ' ')) . $separator;
        }
        return $string;
    }

    public static function titleCustom($text)
    {
        $text = str_replace('[b]', '<span class="highlight">', $text);
        $text = str_replace('[i]', '<span class="italic-font">', $text);
        $text = str_replace('[/b]', '</span>', $text);
        $text = str_replace('[/i]', '</span>', $text);

        return $text;
    }

    public static function get_string_between($string, $start, $end)
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) {
            return '';
        }
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    public static function obfuscated($email)
    {
        $alwaysEncode = [
            '.',
            ':',
            '@'
        ];

        $result = '';

        // Encode string using oct and hex character codes
        for ($i = 0; $i < strlen($email); $i++) {
            // Encode 25% of characters including several that always should be encoded
            if (in_array($email[$i], $alwaysEncode) || mt_rand(1, 100) < 25) {
                if (mt_rand(0, 1)) {
                    $result .= '&#' . ord($email[$i]) . ';';
                }
                else {
                    $result .= '&#x' . dechex(ord($email[$i])) . ';';
                }
            }
            else {
                $result .= $email[$i];
            }
        }

        return $result;
    }

    public static function fileSize($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ('GB');
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ('MB');
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ('KB');
        } elseif ($bytes > 1) {
            $bytes = $bytes . ('bytes');
        } elseif ($bytes == 1) {
            $bytes = $bytes . ('byte');
        } else {
            $bytes = '0 ' . ('bytes');
        }

        return $bytes;
    }
}
