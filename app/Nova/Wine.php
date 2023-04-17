<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Wine extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Wine>
     */
    public static $model = \App\Models\Wine::class;

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
        'nickname',
        'name',
        'vintage',
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
            ID::make()->sortable()->hideFromIndex()->hideFromDetail(),
            Text::make('name')->sortable()->hideFromIndex()->rules('required'),
            Text::make('Nickname (Not shown to users)', 'nickname')->sortable()->rules('required'),
            Text::make('vintage')->sortable()->rules('required'),
            Text::make('uuid')->sortable()->rules('required'),
            Boolean::make('Public (Books)', 'public')->sortable()->rules('required'),
            Boolean::make('Public (Web)', 'public_wineclub')->sortable()->rules('required'),
            Boolean::make('Show FOB in DPB', 'show_fob_in_pb')->sortable()->rules('required'),
            Text::make('Slug')->hideFromIndex()->rules('required'),
            Text::make('appellation')->hideFromIndex()->nullable(),
            BelongsTo::make('Winery')->sortable()->rules('required'),
            Number::make('Sort Order')->sortable()->hideFromIndex()->rules('required'),
            BelongsTo::make('Bottle Size', 'bottleSize')->sortable()->hideFromIndex()->rules('required'),
            BelongsTo::make('Wine Type', 'wineType')->sortable()->hideFromIndex()->rules('required'),
            BelongsTo::make('Pack Size', 'packSize')->sortable()->hideFromIndex()->rules('required'),
            Number::make('Alcohol %', 'alc')->hideFromIndex()->step(0.01)->nullable(),
            Number::make('pH')->step(0.01)->hideFromIndex()->nullable(),
            Text::make('TA')->hideFromIndex()->nullable(),
            Text::make('rs')->hideFromIndex()->nullable(),
            Text::make('sulfur')->hideFromIndex()->nullable(),
            Text::make('soil')->hideFromIndex()->nullable(),
            Text::make('altitude')->hideFromIndex()->nullable(),
            Text::make('vineyard age years')->hideFromIndex()->nullable(),
            Text::make('production size')->hideFromIndex()->nullable(),
            Textarea::make('Profile', 'text_profile')->alwaysShow()->nullable(),
            //Textarea::make('Profile (Print) Max 255 chars', 'text_profile_print')->alwaysShow()->nullable()->withMeta(['extraAttributes' => ['maxlength' => 255]]),
            Textarea::make('Grape Growing', 'text_grape_growing')->alwaysShow()->nullable(),
            Textarea::make('Winemaking', 'text_winemaking')->alwaysShow()->nullable(),
            Textarea::make('More about the wine', "text_more_about_the_wine")->alwaysShow()->nullable(),
            Textarea::make('Pairing Options', "text_pairing")->alwaysShow()->nullable(),
            Textarea::make('Complimentary Cuisines', "text_pairing_2")->alwaysShow()->nullable(),
            Image::make('image file (500 x 750)', 'image_file')->disk('managed_content')->nullable(),
            BelongsToMany::make('Grapes')->fields(function () {
                return [
                    Text::make('Percentage'),
                ];
            }),
            BelongsToMany::make('Price Types', 'prices')->fields(function () {
                return [
                    Text::make('Price'),
                ];
            }),

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
