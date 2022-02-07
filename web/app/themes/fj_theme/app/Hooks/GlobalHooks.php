<?php

namespace App\Hooks;

use App\PostTypes\Univers;
use App\Twig\RateExtension;
use Dugajean\WpHookAnnotations\Models\Filter;
use Dugajean\WpHookAnnotations\Models\Action;
use Rareloop\Lumberjack\Post;

/**
 * Class TimberHooks
 * @see https://github.com/dugajean/wp-hook-annotations#usage
 * @package App\Hooks
 */
class GlobalHooks
{

    /**
     * @Action(tag="wp_enqueue_scripts")
     */
    public static function themeScripts()
    {
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), false, false);
       // wp_enqueue_style("style_global", mix("/styles/global.css"));
        //wp_enqueue_script("script_global", mix("/scripts/global.js"), array("jquery"), false, true);
    }

    /**
     * @Filter(tag="timber_context")
     */
    public static function globalContext($context)
    {

        $options = get_fields("option");

        $context['link'] = isset($options['link'] )? $options['link'] : null;
        $context['footer'] = isset($options['footer'] )? $options['footer'] : null;
        $context['main_infos'] = isset($options['main_infos'] )? $options['main_infos'] : null;
        $context['config'] = isset($options['config']) ?: null;

        $context['current_url'] = "$_SERVER[REQUEST_URI]";

        if ( function_exists( 'yoast_breadcrumb' ) ) {
            $context['breadcrumb'] = yoast_breadcrumb('<nav id="breadcrumb" class="main-breadcrumb">','</nav>', false );
        }

        return $context;
    }

    /**
     * Breadcumb
     * @Filter(tag="wpseo_breadcrumb_links")
     */
    public static function breadcrumbOverride($links){

        global $post;
        $const = get_fields("option")['link'];
        $postTypes = [
            // Sector::getPostType() => $const['all_sectors']
        ];
        foreach ($postTypes as $postType => $page) {
            if (is_singular($postType)) {
                $spliceLength = -2;
                $breadcrumb[] = [
                    'url' => get_permalink($page),
                    'text' => get_the_title($page),
                ];
                array_splice($links, 1, $spliceLength, $breadcrumb);
                $breadcrumb_current[] = [
                    'url' => "",
                    'text' => $post->post_title,
                ];
                array_splice($links, -1, 1, $breadcrumb_current);
            }
        }
        return $links;
    }

    /**
     * Preview acf block
     * @Filter(tag="acf/pre_load_post_id", priority=10, accepted_args=2)
     */
    public static function function($default, $post_id)
    {
        if (is_preview()) {
            return get_the_ID();
        }
        return $default;
    }

}
