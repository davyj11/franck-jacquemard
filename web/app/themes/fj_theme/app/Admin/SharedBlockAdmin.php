<?php

namespace App\Admin;

use Adeliom\WP\Extensions\Admin\AbstractAdmin;

use Adeliom\Acf\Fields\IconPicker;
use Traversable;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Link;
use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\WysiwygEditor;
use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Repeater;

/**
 * Class SharedBlockAdmin
 * @package App\Admin
 */
class SharedBlockAdmin extends AbstractAdmin
{

    public static function getTitle(): string
    {
        return __('Blocs partagés');
    }


    public static function getSlug(): string
    {
        return 'blocs_partagés';
    }


    /**
     * Register has option page
     * @return bool
     */
    public static function hasOptionPage(): bool
    {
        return true; // false by default
    }

    public static function getStyle(): string
    {
        return 'default';
    }

    /**
     * @see https://github.com/wordplate/extended-acf#fields
     * @return Traversable
     */
    public static function getFields(): Traversable
    {

        yield Tab::make(__("Nous contacter"));
        yield Group::make("Nous contacter", "contact")
            ->instructions('Renseignez les données relatives au bloc "Nous contacter"')
            ->fields([
                Text::make(__("Titre de la section"), "title")->required(),

                WysiwygEditor::make(__("Description"), "text")
                    ->tabs('visual')
                    ->mediaUpload(false)
                    ->required(),

                \AcfUtils::button(),

                Image::make(__("Image"), "img")
                    ->library("all")
                    ->previewSize("medium")
                    ->returnFormat('array')
                    ->required()
            ])
            ->layout('row');

    }

    /**
     * Register option page settings
     * @see https://github.com/soberwp/intervention/blob/master/.github/add-acf-page.md
     * @return array
     */
    public static function setupOptionPage(): array
    {
        return [
            "settings" => "Blocs partagés",
            "roles" => ['admin', 'editor']
        ];
    }

    /**
     * @see https://github.com/wordplate/extended-acf#location
     * @return Traversable
     */
    public static function getLocation(): Traversable
    {
        yield Location::if('options_page', self::getSlug());
    }
}
