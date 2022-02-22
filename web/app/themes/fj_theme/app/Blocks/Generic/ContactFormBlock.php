<?php

namespace App\Blocks;

use Adeliom\WP\Extensions\Blocks\AbstractBlock;
use App\Admin\Utils\Helpers;
use App\Enum\GutBlockName;
use App\Helpers\Gutenberg\GutenbergBlockHelper;
use WordPlate\Acf\Fields\Radio;
use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\TrueFalse;
use WordPlate\Acf\Fields\Wysiwyg;
use WordPlate\Acf\Fields\WysiwygEditor;

/**
 * Class ContactBlock
 * @see https://github.com/wordplate/extended-acf#fields
 * @package App\Admin
 */
class ContactFormBlock extends AbstractBlock
{

    public function __construct()
    {
        parent::__construct([
            'title'       => __('Formulaire de contact'),
            'description' => __('Bloc de contact'),
            'category'    => GutBlockName::GENERIC,
            'post_types'  => GutenbergBlockHelper::commonsTemplate(),
            'mode'           => 'edit'
        ]);
    }

    protected function registerFields(): \Traversable
    {
        yield Text::make(__("Shortcode du formulaire"), "form")->required();

    }

}
