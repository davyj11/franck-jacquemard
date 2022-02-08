<?php

namespace App\Blocks;

use Adeliom\WP\Extensions\Blocks\AbstractBlock;
use App\Enum\GutBlockName;
use App\Helpers\Gutenberg\GutenbergBlockHelper;
use Traversable;
use WordPlate\Acf\ConditionalLogic;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Radio;
use WordPlate\Acf\Fields\RadioButton;
use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Wysiwyg;
use WordPlate\Acf\Fields\WysiwygEditor;

/**
 * Class TextImageBlock
 * @see https://github.com/wordplate/extended-acf#fields
 * @package App\FlexibleLayout
 */
class AboutBlock extends AbstractBlock
{
    public static function getBlockName()
    {
        return 'acf/about-block';
    }

    public function __construct()
    {
        parent::__construct([
            'title'       => __('Qui sommes nous ?'),
            'description' => __('Description : Bloc avec texte, 2 images et des chiffres mis en avant'),
            'category'    => GutBlockName::GENERIC,
            'post_types'  => GutenbergBlockHelper::commonsTemplate(),
            'mode'        => 'edit',
            'enqueue_assets' => function () {
                wp_enqueue_style('header', get_template_directory_uri() . '/build/components/blocks/about/index.css');
            },
        ]);
    }

    /**
     * @return Traversable
     */
    protected function registerFields(): \Traversable
    {
        yield Image::make(__("Image haute"), "img_top")
            ->library("all")
            ->previewSize("medium")
            ->returnFormat('array')
            ->required();

        yield Text::make(__("Titre"), "title");

        yield WysiwygEditor::make(__("Texte"), "text")
            ->tabs('visual')
            ->mediaUpload(false)
            ->required();

        yield \AcfUtils::button();

        yield Group::make(__('Chiffre 1'), 'number1')
            ->fields([
                Text::make(__("Chiffre"), "value")->required(),
                Text::make(__("Description"), "desc")->required(),
            ])->wrapper(['width' => 50]);

        yield Group::make(__('Chiffre 2'), 'number2')
            ->fields([
                Text::make(__("Chiffre"), "value")->required(),
                Text::make(__("Description"), "desc")->required(),
            ])->wrapper(['width' => 50]);

        yield Image::make(__("Image basse"), "img_bottom")
            ->library("all")
            ->previewSize("medium")
            ->returnFormat('array')
            ->required();


    }

}
