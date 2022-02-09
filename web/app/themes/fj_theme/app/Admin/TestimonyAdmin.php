<?php


namespace App\Admin;

use Adeliom\WP\Extensions\Admin\AbstractAdmin;
use App\Admin\Utils\HideFields;
use App\Hooks\UtilsHooks;
use App\PostTypes\City;
use App\PostTypes\Testimony;
use App\Taxonomies\Invests\Category;
use WordPlate\Acf\Fields\GoogleMap;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Number;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Tab;
use Traversable;
use WordPlate\Acf\Fields\Taxonomy;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\WysiwygEditor;
use WordPlate\Acf\Location;

class TestimonyAdmin extends AbstractAdmin
{
    /**
     * @return string
     */
    public static function getTitle(): string
    {
        return 'Témoignages';
    }

    /**
     * @return array|string[]
     */
    public static function getHideOnScreen(): array
    {
        return HideFields::make();
    }



    /**
     * @see https://github.com/woetplate/extended-acf#fields
     * @return Traversable
     */
    public static function getFields(): Traversable
    {

        yield Group::make(__('Témoignage'), 'testi')
            ->fields([
                Number::make(__('Note /5'), 'rating')->min(0)->max(5),
                Text::make(__('Titre'), 'title'),
                WysiwygEditor::make(__("Témoignage"), "text")->required()->toolbar('without_headings'),
                Text::make(__('Nom du client'), 'name')->required(),
                Text::make(__('Date de réalisation (ex : octobre 2021)'), 'date'),
            ]);
    }

    /**
     * @see https://github.com/woetplate/extended-acf#location
     * @return Traversable
     */
    public static function getLocation(): Traversable
    {
        yield Location::if('post_type', Testimony::getPostType());
    }
}
