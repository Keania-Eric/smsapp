<?php

return [

    'smsprovider' => [

    	'baseUri' =>env('SMS_PROVIDER_BASE_URL'),

    	'sender' =>env('SMS_PROVIDER_SENDER'),

		'password'=>env('SMS_PROVIDER_PASSWORD'),
		
		'username'=>env('SMS_PROVIDER_USERNAME')
    
    ]
];
?>