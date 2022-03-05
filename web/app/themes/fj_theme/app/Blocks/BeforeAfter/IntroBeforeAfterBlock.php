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
class IntroBeforeAfterBlock extends AbstractBlock
{
    public static function getBlockName()
    {
        return 'acf/intro-before-after-block';
    }

    public function __construct()
    {
        parent::__construct([
            'title'       => __('Intro à la page avant/après'),
            'description' => __('Bloc introduisant la page avant/après'),
            'category'    => GutBlockName::BEFORE_AFTER,
            'post_types'  => GutenbergBlockHelper::commonsTemplate(),
            'mode'           => 'edit',
            'dir' => 'views/blocks/beforeAfter',
            'multiple'    => false,
            'enqueue_assets' => function () {
                wp_enqueue_style('intro-before-after-block', get_template_directory_uri() . '/build/components/blocks/intro_before_after/index.css');
                //wp_enqueue_script( 'all-realisations-block', get_template_directory_uri() . '/build/components/blocks/all_realisations/index.js', '', '', false );
            },
        ]);
    }

    protected function registerFields(): \Traversable
    {
        yield Text::make(__("Titre"), "title");

        yield WysiwygEditor::make(__("Texte"), "text")
            ->tabs('visual')
            ->mediaUpload(false)
            ->required();

        yield \AcfUtils::button();

        yield Image::make(__("Image avant"), "img_before")
            ->library("all")
            ->previewSize("medium")
            ->returnFormat('array')
            ->required();

        yield Image::make(__("Image avant"), "img_after")
            ->library("all")
            ->previewSize("medium")
            ->returnFormat('array')
            ->required();
    }

}
