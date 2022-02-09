<?php

namespace App\PostTypes;

use Adeliom\WP\Extensions\PostTypes\Post as BasePost;
use App\Blocks\HeaderJobBlock;
use Closure;
use Timber\Timber;

/**
 * Class Example
 * @package App\PostTypes
 */
class Testimony extends BasePost
{
    /**
     * Return the key used to register the post type with WordPress
     *
     * @return string
     */
    public static function getPostType()
    {
        return 'testimony';
    }

    /**
     * Overwrite the post slug when a post is saved
     * https://github.com/mindkomm/types#register-post-types
     *
     * @return Closure
     */
    protected static function getPostTypeCustomSlug()
    {
        return function ($post_slug, $post_data, $post_id) {
            return $post_slug;
        };
    }

    /**
     * Return the config to use to register the post type with WordPress
     * https://github.com/mindkomm/types#register-post-types
     *
     * @return array
     */
    public static function getPostTypeConfig()
    {
        $labels = [
            'name' => __('Témoignages', 'Post Type General Name'),
            'singular_name' => __('Témoignage', 'Post Type Singular Name'),
            'menu_name' => __('Témoignages'),
            'all_items' => __('Tous les témoignages'),
            'view_item' => __('Voir le témoignage'),
            'add_new_item' => __('Ajouter un témoignage'),
            'add_new' => __('Ajouter'),
            'edit_item' => __('Editer le témoignage'),
            'update_item' => __('Modifier le témoignage'),
            'search_items' => __('Rechercher un témoignage'),
            'not_found' => __('Non trouvé'),
            'not_found_in_trash' => __('Non trouvé dans la corbeille'),
        ];

        return [
            'name_plural' => __('Témoignages'),
            'args' => [
                'menu_icon' => 'dashicons-megaphone',
                'hierarchical' => false,
                'has_archive' => true,
                'show_in_rest' => true,
                'supports' => [
                    'title', 'custom-fields'
                ],
                'labels' => $labels,
                'public' => true
            ],
            'admin_columns' => [
                'date' => true, // Disable date in list view
            ],
        ];
    }

}
