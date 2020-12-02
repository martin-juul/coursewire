<?php

return [
    'name'      => env('BRANDING_NAME', 'Syddansk Erhvervsskole'),
    'email'     => env('BRANDING_EMAIL', 'sde@sde.dk'),
    'phone'     => env('BRANDING_PHONE', '+4570109900'),
    'acronym'   => env('BRANDING_ACRONYM', 'SDE'),
    'url'       => env('BRANDING_URL', 'https://www.sde.dk'),
    'address'   => [
        'street'      => env('BRANDING_ADDRESS_STREET', 'Munkebjergvej 130'),
        'locality'    => env('BRANDING_ADDRESS_LOCALITY', 'Odense'),
        'country'     => env('BRANDING_ADDRESS_COUNTRY', 'DK'),
        'postal_code' => env('BRANDING_ADDRESS_POSTAL_CODE', '5230'),
    ],
    'education' => [
        // See https://schema.org/programType
        'programType' => env('BRANDING_EDUCATION_PROGRAM_TYPE', 'apprenticeship'),
    ],
];