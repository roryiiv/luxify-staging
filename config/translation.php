<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    |  The models to use for storing locales, and translations.
    |
    */

    'models' => [

        /*
        |--------------------------------------------------------------------------
        | Locale Model
        |--------------------------------------------------------------------------
        |
        |  The locale model is used for storing locales such as `en` or `fr`.
        |
        */

        'locale' => Stevebauman\Translation\Models\Locale::class,

        /*
        |--------------------------------------------------------------------------
        | Translation Model
        |--------------------------------------------------------------------------
        |
        |  The translation model is used for storing translations.
        |
        */

        'translation' => Stevebauman\Translation\Models\Translation::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Clients
    |--------------------------------------------------------------------------
    |
    |  The services providing translation.
    */

    'clients' => [

        /*
        |--------------------------------------------------------------------------
        | Translation client
        |--------------------------------------------------------------------------
        |
        |  The translation client providing translation service, must implement
        |  Stevebauman\Translation\Contracts\Client.
        |
        */

        'client' => Stevebauman\Translation\Clients\GoogleTranslate::class,

        /*
        |--------------------------------------------------------------------------
        | Api Key
        |--------------------------------------------------------------------------
        |
        |  If the client requires an API key, enter below.
        |
        */

        'api_key' => env('TRANSLATE_API_KEY'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Request Segment
    |--------------------------------------------------------------------------
    |
    | Using the route prefix method of setting the locale dynamically,
    | this integer is used to retrieve the segment to retrieve
    | the locale code from inside the URL.
    |
    | For example, if you're wanting to use a URL of `http://website.com/fr`,
    | You would insert `1`, as the locale is the first segment of the URL.
    |
    */

    'request_segment' => 1,

    /*
    |--------------------------------------------------------------------------
    | Shorthand Enabled
    |--------------------------------------------------------------------------
    |
    | Enables use of the shorthand translation function.
    |
    | For example: _t($text = 'Translate', $replacements = array(), $toLocale = 'en');
    |
    */

    'shorthand_enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Auto Translate
    |--------------------------------------------------------------------------
    |
    | Automatically translates text inserted by using google translate.
    |
    */

    'auto_translate' => true,

    /*
    |--------------------------------------------------------------------------
    | Cache Time
    |--------------------------------------------------------------------------
    |
    | The amount of minutes to store the translations / locales in cache,
    | default is 30 minutes.
    |
    */

    'cache_time' => 30,

    /*
    |--------------------------------------------------------------------------
    | Default Locale
    |--------------------------------------------------------------------------
    |
    | The default application locale you would like to translate strings from.
    |
    | For example, if you choose `en` as the default locale, then all strings
    | will be translated from english, to the new set locale.
    |
    */

    'default_locale' => 'en_us',

    /*
    |--------------------------------------------------------------------------
    | Locales
    |--------------------------------------------------------------------------
    |
    | The locales array is used for allowing only certain locales to
    | be located inside the route segment for `Translation::getRoutePrefix()`.
    |
    | The list is also used for converting locale codes to locale names.
    |
    | Feel free to add or remove locales you don't need.
    |
    */

    'locales' => [
        'zh' => 'Chinese',
        'zh_cn' => 'Chinese',
        'zh_hk' => 'Hongkong',
        'cn' => 'Chinese',
        'hk' => 'Chinese',
        'en' => 'English',
        'fr' => 'France',
    ],

];
