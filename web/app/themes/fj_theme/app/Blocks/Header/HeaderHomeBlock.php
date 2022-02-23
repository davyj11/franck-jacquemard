<?php

namespace App\Blocks;

use Adeliom\WP\Extensions\Blocks\AbstractBlock;
use App\Admin\Utils\Helpers;
use App\Enum\GutBlockName;
use App\Helpers\Gutenberg\GutenbergBlockHelper;
use App\Repositories\PostRepository;
use Timber\Post;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Link;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Textarea;

/**
 * Class HeaderBlock
 * @see https://github.com/wordplate/extended-acf#fields
 * @package App\Admin
 */
class HeaderHomeBlock extends AbstractBlock
{
    public static function getBlockName()
    {
        return 'acf/header-home-block';
    }

    public function __construct()
    {
        parent::__construct([
            'title'       => __('Header accueil'),
            'description' => __('Header accueil à placer en premier sur la page'),
            'category'    => GutBlockName::HEADER_HOME,
            'post_types'  => GutenbergBlockHelper::commonsTemplate(),
            'mode'        => 'edit',
            'dir'         => 'views/blocks/header',
            'multiple'    => false,
            'enqueue_assets' => function () {
                wp_enqueue_style('header', get_template_directory_uri() . '/build/components/blocks/header/index.css');
               // wp_enqueue_style('slider', get_site_url(null,'/build/components/blocks/header/styles.pcss'), '', '', true);
            },
        ]);
    }

    protected function registerFields(): \Traversable
    {
        yield Textarea::make(__("Titre"), "title")
            ->newLines('br')
            ->required();

        yield Link::make("Bouton (optionnel)", 'button');

        yield Image::make(__("Image"), "img")
            ->library("all")
            ->previewSize("medium")
            ->returnFormat('array')
            ->required();
    }

}
