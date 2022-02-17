<?php

namespace App\Blocks;

use Adeliom\WP\Extensions\Blocks\AbstractBlock;
use App\Admin\Utils\Helpers;
use App\Enum\GutBlockName;
use App\Helpers\Gutenberg\GutenbergBlockHelper;
use WordPlate\Acf\Fields\Gallery;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Radio;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Wysiwyg;
use WordPlate\Acf\Fields\WysiwygEditor;

/**
 * Class AllRealisationsBlock
 * @see https://github.com/wordplate/extended-acf#fields
 * @package App\Admin
 */
class AllRealisationsBlock extends AbstractBlock
{
    public static function getBlockName()
    {
        return 'acf/last-realisations-block';
    }

    public function __construct()
    {
        parent::__construct([
            'title'       => __('Toutes les réalisations'),
            'description' => __('Bloc remontant les réalisations'),
            'category'    => GutBlockName::GENERIC,
            'post_types'  => GutenbergBlockHelper::commonsTemplate(),
            'mode'           => 'edit',
            'dir' => 'views/blocks',
            'multiple'    => false,
            'enqueue_assets' => function () {
                //wp_enqueue_style('realisations-block', get_template_directory_uri() . '/build/components/blocks/last_realisations/index.css');
                //wp_enqueue_script( 'realisations-block', get_template_directory_uri() . '/build/components/blocks/last_realisations/index.js', '', '', false );
            },
        ]);
    }

    protected function registerFields(): \Traversable
    {
        yield Gallery::make(__("Gallerie d'images"), "gallery")
            ->mimeTypes(['jpg', 'jpeg', 'png'])
            ->min(10)
            ->required();
    }

}
