<?php

return (object) [
    'debug' => false,
    'login' => (object)[
        'email' => '', // disabled. Put it in the api
        'password' => ''  // disabled. Put it in the api
    ],
    'node_api_url' => 'https://api.my-domain.com.br/',
    'temp_folder' => __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/temp'
];
