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
            ["field"=>"id","show"=>0],
			["field"=>"email","show"=>0]
        ]
    ],
];
