<?php

return (object) [
    'debug' => true,
    'login' => (object)[
        'email' => '', // disabled. Put it in the api
        'password' => ''  // disabled. Put it in the api
    ],
    'node_api_url' => 'https://your-domain.com',
    'temp_folder' => __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'temp'
];
