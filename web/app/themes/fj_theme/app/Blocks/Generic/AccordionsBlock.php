<?php

namespace App\Blocks;

use Adeliom\WP\Extensions\Blocks\AbstractBlock;
use App\Enum\GutBlockName;
use App\Helpers\Gutenberg\GutenbergBlockHelper;
use Traversable;
use WordPlate\Acf\ConditionalLogic;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Radio;
use WordPlate\Acf\Fields\RadioButton;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\TrueFalse;
use WordPlate\Acf\Fields\Wysiwyg;
use WordPlate\Acf\Fields\WysiwygEditor;

/**
 * Class TextImageBlock
 * @see https://github.com/wordplate/extended-acf#fields
 * @package App\FlexibleLayout
 */
class AccordionsBlock extends AbstractBlock
{

    public function __construct()
    {
        parent::__construct([
            'title' => __("Liste d'accordéons"),
            'description' => __("Description : Liste d'accordéons avec texte et image(s)"),
            'category' => GutBlockName::GENERIC,
            'post_types' => GutenbergBlockHelper::commonsTemplate(),
            'mode' => 'edit'
        ]);
    }

    /**
     * @return Traversable
     */
    protected function registerFields(): \Traversable
    {
        yield Repeater::make(__('Accordéons'), 'accordions')
            ->fields([
                Text::make(__("Titre"), "title")->required(),

                WysiwygEditor::make(__("Texte"), "text")
                    ->tabs('visual')
                    ->mediaUpload(false)
                    ->required(),
                \AcfUtils::button(),
                Repeater::make("Image(s)", 'images')
                    ->fields([
                        Image::make(__("Image"), "img")
                            ->library("all")
                            ->previewSize("medium")
                            ->returnFormat('array')
                            ->required(),
                    ])
                    ->min(1)
                    ->max(2),
                RadioButton::make(__('Position de l\'image'), "img_position")
                    ->choices([
                        'left' => '<span style=" border: 1px solid #ccc;padding: 10px;display: flex;align-items: center;justify-content: center;width: 70px;margin-top: 10px;margin-bottom: 20px;"><span class="dashicons dashicons-format-image"></span><span class="dashicons dashicons-text"></span></span>',
                        'right' => '<span style=" border: 1px solid #ccc;padding: 10px;display: flex;align-items: center;justify-content: center;width: 70px;margin-top: 10px;margin-bottom: 20px;"><span class="dashicons dashicons-text"></span><span class="dashicons dashicons-format-image"></span></span>'
                    ])
                    ->defaultValue("left")
                    ->required(),

            ])
            ->min(2)
        ->layout('block');
    }

}
