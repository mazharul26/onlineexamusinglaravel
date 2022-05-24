<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Name of route
    |--------------------------------------------------------------------------
    |
    | Enter the routes name to enable dynamic imagecache manipulation.
    | This handle will define the first part of the URI:
    |
    | {route}/{template}/{filename}
    |
    | Examples: "images", "img/cache"
    | {{ route('imagecache', [ 'template'=>'sbixs','filename' => $post->fiName() ]) }}
    */

    'route' => 'uslive',

    /*
    |--------------------------------------------------------------------------
    | Storage paths
    |--------------------------------------------------------------------------
    |
    | The following paths will be searched for the image filename, submitted
    | by URI.
    |
    | Define as many directories as you like.
    |
    */

    'paths' => [
        // public_path('upload'),
        // public_path('images')
        public_path('img'),
        public_path('storage/workStation/image'),
        public_path('storage/work/image'),
        public_path('storage/user/image'),
        public_path('storage/product/media/brand'),
        public_path('storage/seller/logo'),
        public_path('storage/media/job'),
        public_path('storage/media/category/image'),
        public_path('storage/media/category/banner'),
        public_path('storage/media/brand/image'),
        public_path('storage/product/fi'),
        public_path('storage/product/media/subcategory'),
        public_path('storage/coupon/media/featureimage'),
        public_path('storage/galleryimage'),
        public_path('storage/product/media/skuimage'),
        public_path('storage/product/media/featureimage'),
        public_path('storage/product/media/subsubcategory'),
        public_path('storage/user/profile'),
        public_path('storage/service/profile'),
        public_path('storage/orders/actual'),
        public_path('storage/orders/planned'),
        public_path('storage/orders'),

    ],

    /*
    |--------------------------------------------------------------------------
    | Manipulation templates
    |--------------------------------------------------------------------------
    |
    | Here you may specify your own manipulation filter templates.
    | The keys of this array will define which templates
    | are available in the URI:
    |
    | {route}/{template}/{filename}
    |
    | The values of this array will define which filter class
    | will be applied, by its fully qualified name.
    |
    */

    'templates' => array(

        'small' => 'Intervention\Image\Templates\Small',
        'medium' => 'Intervention\Image\Templates\Medium',
        'large' => 'Intervention\Image\Templates\Large',
        'ppxxs' => 'App\ImageFilters\ProfilePicXXS',
        'fifh' => 'App\ImageFilters\FeatureImageForHome',
        'ppxs' => 'App\ImageFilters\ProfilePicXS',
        'ppsm' => 'App\ImageFilters\ProfilePicSmall',
        'ppsmbl' => 'App\ImageFilters\ProductPicSmallBlur',
        'ppmd' => 'App\ImageFilters\ProfilePicMedium',
        'pplg' => 'App\ImageFilters\ProfilePicLarge',
        'ppxlg' => 'App\ImageFilters\ProfilePicXLarge',
        'cpxs' => 'App\ImageFilters\CoverPicXS',
        'cpxxxs' => 'App\ImageFilters\CoverPicXXXS',
        'cpsm' => 'App\ImageFilters\CoverPicSmall',
        'cpmd' => 'App\ImageFilters\CoverPicMedium',
        'cplg' => 'App\ImageFilters\CoverPicLarge',
        'cpxlg' => 'App\ImageFilters\CoverPicXLarge',
        'cpxxlg' => 'App\ImageFilters\CoverPicXXLarge',
        'slmd' => 'App\ImageFilters\LogoMedium',
        'pfilg' => 'App\ImageFilters\ProductPicLarge',
        'pfimd' => 'App\ImageFilters\ProductPicMedium',
        'pfism' => 'App\ImageFilters\ProductPicSmall',
        'pnism' => 'App\ImageFilters\ProductNormalPicSmall',
        'pnimd' => 'App\ImageFilters\ProductNormalPicMedium',
        'pnilg' => 'App\ImageFilters\ProductNormalPicLarge',
        'sbism' => 'App\ImageFilters\SidebarImageSmall',
        'sbixs' => 'App\ImageFilters\SidebarImageXtraSmall',
        'lh' => 'App\ImageFilters\LogoHeader',
    ),

    /*
    |--------------------------------------------------------------------------
    | Image Cache Lifetime
    |--------------------------------------------------------------------------
    |
    | Lifetime in minutes of the images handled by the imagecache route.
    |
    */

    'lifetime' => 43200,

];
