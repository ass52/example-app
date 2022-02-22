<?php
/** Admiko global search configuration**/



/**IMPORTANT: this page will be overwritten and any change will be lost!!
 ** use admiko_global_search_custom.php to add your models into global search!!
 **/
return [
    [
        'name' => 'Application',
        'route_id' => 'application',
        'model' => 'Application',
        'fields' => [
            ["field"=>"id","show"=>1],
			["field"=>"app_name","show"=>1],
			["field"=>"appdescrption","show"=>0],
			["field"=>"app_pkg","show"=>1],
			["field"=>"appicon","show"=>1],
			["field"=>"appwidelog","show"=>1],
			["field"=>"apptv_binner","show"=>1],
			["field"=>"appsplashimage","show"=>1],
			["field"=>"appbackground","show"=>1],
			["field"=>"adprimary_colour","show"=>1],
			["field"=>"adsecoundry_colur","show"=>1],
			["field"=>"appthiredcolur","show"=>1],
			["field"=>"verstion_code","show"=>1]
        ]
    ],
];
