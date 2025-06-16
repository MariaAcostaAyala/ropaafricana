<?php
// Configuración general de la aplicación
return [
    // Configuración de la aplicación
    'name' => 'Ropa Africana',
    'url' => 'http://localhost/ROPAAFRICANA/',
    'frontend_url' => 'http://localhost/ROPAAFRICANA/frontend/',
    'backend_url' => 'http://localhost/ROPAAFRICANA/backend/',
    
    // Configuración de zona horaria
    'timezone' => 'Europe/Madrid',
    
    // Configuración de sesión
    'session' => [
        'lifetime' => 120,
        'expire_on_close' => false,
        'encrypt' => false,
        'cookie' => 'tienda_session',
        'path' => '/',
        'domain' => null,
        'secure' => false,
        'http_only' => true,
    ],
    
    // Configuración de correo electrónico
    'mail' => [
        'from' => [
            'name' => 'Administrador',
            'address' => 'info@tutiendaafricana.com'
        ],
        'reply_to' => [
            'name' => 'Administrador',
            'address' => 'info@tutiendaafricana.com'
        ]
    ],
    
    // Configuración de la empresa
    'company' => [
        'name' => 'Tienda Ropa Africana',
        'description' => 'Tu tienda de Murcia de confianza',
        'slogan' => 'Contáctenos en:',
        'company' => 'Tienda Ropa Africana S.L.',
        'cif' => 'B12345678',
        'contact' => [
            'phone' => '(968) 99 99 99',
            'email' => 'soporte@tiendaafricana.es',
            'address' => 'Calle No Indicada, Murcia, España',
            'city' => 'Murcia',
            'country' => 'España'
        ]
    ],
    
    // Configuración de redes sociales
    'social' => [
        'facebook' => 'https://facebook.com/tutiendaafricana',
        'twitter' => 'https://twitter.com/tutiendaafricana',
        'instagram' => 'https://instagram.com/tutiendaafricana',
        'youtube' => 'https://youtube.com/tutiendaafricana'
    ],
    
    // Configuración del mapa
    'map' => [
        'latitude' => '37.99907904732925',
        'longitude' => '-1.13808485117462',
        'zoom' => '15',
        'width' => '100%',
        'height' => '200',
        'style' => 'border:0',
        'title' => 'Nuestra ubicación',
        'address' => 'Calle No Indicada, Murcia, España',
        'place_id' => 'ChIJXXXXXXXXXXXXXXXXXXXXXX',
        'type' => 'roadmap',
        'language' => 'es',
        'region' => 'es'
    ]
]; 