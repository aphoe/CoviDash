<?php
return [
    'appName'               => 'CoviDash',
    'appUrl'                => 'https://github.com/aphoe',

    'instanceName'          => env('CODA_INSTANCE_NAME', 'CoviDash'),
    'instanceNameShort'     => env('CODA_INSTANCE_NAME_SHORT', 'CD'),
    'instanceSlogan'        => env('CODA_INSTANCE_SLOGAN', ''),
    'admin_email'           => env('CODA_INSTANCE_ADMIN_EMAIL', ''),
    'country'               => env('CODA_INSTANCE_COUNTRY', 'NG'),
    'disease'               => env('CODA_DISEASE', 'COVID-19'),
];
