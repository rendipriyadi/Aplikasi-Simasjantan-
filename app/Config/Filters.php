<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'filteradmin' => \App\Filters\Filteradmin::class,
        'filteruser' => \App\Filters\Filteruser::class,
        'filterdirektur' => \App\Filters\Filterdirektur::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
            'filteradmin' => [
                'except' => ['login/*', 'login', '/']
            ],
            'filteruser' => [
                'except' => ['login/*', 'login', '/']
            ],
            'filterdirektur' => [
                'except' => ['login/*', 'login', '/']
            ]
        ],
        'after' => [
            'filteradmin' => [
                'except' => [
                    'login', 'login/*',
                    'layout', 'layout/*',
                    'gangguan', 'gangguan/*',
                    'sumberinformasi', 'sumberinformasi/*',
                    'mobil', 'mobil/*',
                    'bbmMobil', 'bbmMobil/*',
                    'kejadian', 'kejadian/*',
                    'laporan', 'laporan/*',
                    'penyebab', 'penyebab/*',
                    'petugas', 'petugas/*',
                    'sta', 'sta/*',
                    'tipe', 'tipe/*',
                    'petugashariini', 'petugashariini/*',
                    'jadwalmobil', 'jadwalmobil/*',
                    'penerimaanlaporan', 'penerimaanlaporan/*',
                ]
            ],
            'filteruser' => [
                'except' => [
                    'login', 'login/*',
                    'layout', 'layout/*',
                    'mobil', 'mobil/*',
                    'kejadian', 'kejadian/*'
                ]
            ],
            'filterdirektur' => [
                'except' => [
                    'login', 'login/*',
                    'layout', 'layout/*',
                    'kejadian', 'kejadian/*',
                    'laporan', 'laporan/*',
                ]
            ],
            'toolbar',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
