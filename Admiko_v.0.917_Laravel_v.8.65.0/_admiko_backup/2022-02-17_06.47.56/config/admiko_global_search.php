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
            ["field"=>"id","show"=>1]
        ]
    ],
];
