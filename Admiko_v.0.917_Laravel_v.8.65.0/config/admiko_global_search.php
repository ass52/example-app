<?php
/** Admiko global search configuration**/



/**IMPORTANT: this page will be overwritten and any change will be lost!!
 ** use admiko_global_search_custom.php to add your models into global search!!
 **/
return [
    [
        'name' => 'Users',
        'route_id' => 'users',
        'model' => 'Users',
        'fields' => [
            ["field"=>"id","show"=>1],
			["field"=>"email","show"=>1],
			["field"=>"name","show"=>1]
        ]
    ],
    [
        'name' => 'Ad interstaitals',
        'route_id' => 'ad_interstaitals',
        'model' => 'AdInterstaitals',
        'fields' => [
            ["field"=>"id","show"=>1],
			["field"=>"appname","show"=>1],
			["field"=>"ad_id","show"=>1],
			["field"=>"interval1","show"=>1],
			["field"=>"click","show"=>1],
			["field"=>"place_holdername","show"=>1],
			["field"=>"place_holder_descrption","show"=>1]
        ]
    ],
    [
        'name' => 'Add Banners',
        'route_id' => 'add_banners',
        'model' => 'AddBanners',
        'fields' => [
            ["field"=>"id","show"=>1],
			["field"=>"app_name","show"=>1],
			["field"=>"ad_id","show"=>1],
			["field"=>"interval","show"=>1],
			["field"=>"click","show"=>1],
			["field"=>"place_holder_name","show"=>1]
        ]
    ],
];
