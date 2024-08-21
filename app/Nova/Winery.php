<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Winery extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Winery>
     */
    public static $model = \App\Models\Winery::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable()->hideFromDetail()->hideFromIndex(),
            Text::make('Name')->sortable(),
            // Boolean::make('Public (on website)', 'public_wineclub')->sortable(),
            Boolean::make('Public (on website AND price books)', 'public')->sortable(),
            Text::make('Slug')->sortable()->hideFromIndex(),
            BelongsTo::make('Region'),
            Text::make('Winemaker Full Name')->sortable()->hideFromIndex(),
            Text::make('Winemaker First Name')->sortable()->hideFromIndex(),
            Image::make('Winemaker Image (550 x 808)', 'winemaker_image_file')->sortable()->disk('managed_content'),
            Image::make('Winery Image (2000 x 760)', 'winery_image_file')->sortable()->disk('managed_content'),
            Text::make('Total Winery Production')->sortable()->hideFromIndex(),
            Text::make('Vineyard Size')->sortable()->hideFromIndex(),
            Text::make('Farming')->sortable()->hideFromIndex(),
            Text::make('Certification')->sortable()->hideFromIndex(),
            Text::make('Grapes Planted (Red)', 'grapes_planted_red')->sortable()->hideFromIndex(),
            Text::make('Grapes Planted (White)', 'grapes_planted_white')->sortable()->hideFromIndex(),
            Textarea::make('Winemaker Long Description')->sortable()->hideFromIndex()->alwaysShow(),
            // Textarea::make('Winemaker Long Description (Print) Max 255 chars', 'winemaker_long_description_print')->sortable()->hideFromIndex()->alwaysShow()->withMeta(['extraAttributes' => ['maxlength' => 255]]),
            Textarea::make('Winemaker Philosophy')->sortable()->hideFromIndex()->alwaysShow(),
            // Textarea::make('Winemaker Philosophy (Print) Max 255 chars', 'winemaker_philosophy_print')->sortable()->hideFromIndex()->alwaysShow()->withMeta(['extraAttributes' => ['maxlength' => 255]]),
            Textarea::make('Something Random')->sortable()->hideFromIndex()->alwaysShow(),
            // Textarea::make('Something Random (Print) Max 255 chars', 'something_random_print')->sortable()->hideFromIndex()->alwaysShow()->withMeta(['extraAttributes' => ['maxlength' => 255]]),
            Boolean::make('Hide From Dist Price Book')->sortable(),
            HasMany::make('Wines'),
            HasMany::make('Winery Photos', 'photos'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
