<?php

namespace App\Blocks;

use Adeliom\WP\Extensions\Blocks\AbstractBlock;
use App\Admin\Utils\Helpers;
use App\Enum\GutBlockName;
use App\Helpers\Gutenberg\GutenbergBlockHelper;
use WordPlate\Acf\Fields\Gallery;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Message;
use WordPlate\Acf\Fields\Radio;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Wysiwyg;
use WordPlate\Acf\Fields\WysiwygEditor;

/**
 * Class AllReviewsBlock
 * @see https://github.com/wordplate/extended-acf#fields
 * @package App\Admin
 */
class AllReviewsBlock extends AbstractBlock
{
    public static function getBlockName()
    {
        return 'acf/all-reviews-block';
    }

    public function __construct()
    {
        parent::__construct([
            'title'       => __('Tous les avis'),
            'description' => __('Bloc remontant tous les avis'),
            'category'    => GutBlockName::GENERIC,
            'post_types'  => GutenbergBlockHelper::commonsTemplate(),
            'mode'           => 'edit',
            'dir' => 'views/blocks',
            'multiple'    => false,
            'enqueue_assets' => function () {
                wp_enqueue_style('all-testimony-block', get_template_directory_uri() . '/build/components/blocks/testimony/index.css');
                wp_enqueue_script( 'all-testimony-block', get_template_directory_uri() . '/build/components/blocks/testimony/index.js', '', '', false );
            },
        ]);
    }

    protected function registerFields(): \Traversable
    {
        yield Message::make(__('Message', ''))
            ->message(__('Cette section affiche automatiquement tous les avis'));
    }

}
