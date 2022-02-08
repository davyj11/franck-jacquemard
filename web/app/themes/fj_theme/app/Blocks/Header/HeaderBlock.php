<?php

namespace App\Blocks;

use Adeliom\WP\Extensions\Blocks\AbstractBlock;
use App\Admin\Utils\Helpers;
use App\Enum\GutBlockName;
use App\Helpers\Gutenberg\GutenbergBlockHelper;
use App\Repositories\PostRepository;
use Timber\Post;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Text;

/**
 * Class HeaderBlock
 * @see https://github.com/wordplate/extended-acf#fields
 * @package App\Admin
 */
class HeaderBlock extends AbstractBlock
{
    public static function getBlockName()
    {
        return 'acf/header-block';
    }

    public function __construct()
    {
        parent::__construct([
            'title'       => __('Header classique'),
            'description' => __('Header classique à placer en premier sur la page'),
            'category'    => GutBlockName::HEADER,
            'post_types'  => GutenbergBlockHelper::commonsTemplate(),
            'mode'        => 'edit',
            'multiple'    => false,
            'enqueue_assets' => function () {
                wp_enqueue_style('header', get_template_directory_uri() . '/build/components/blocks/header/index.css');
            },
        ]);
    }

    protected function registerFields(): \Traversable
    {
        yield Text::make(__("Titre"), "title")
            ->required();

        yield Image::make(__("Image"), "img")
            ->library("all")
            ->previewSize("medium")
            ->returnFormat('array')
            ->required();
    }

}
