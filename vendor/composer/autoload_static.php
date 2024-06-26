<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6f62e181a42045c5974c12b349c16bfe
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Config\\' => 7,
        ),
        'A' => 
        array (
            'App\\Views\\' => 10,
            'App\\Requests\\' => 13,
            'App\\Models\\' => 11,
            'App\\Controllers\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/config',
        ),
        'App\\Views\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/views',
        ),
        'App\\Requests\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/requests',
        ),
        'App\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/models',
        ),
        'App\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6f62e181a42045c5974c12b349c16bfe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6f62e181a42045c5974c12b349c16bfe::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6f62e181a42045c5974c12b349c16bfe::$classMap;

        }, null, ClassLoader::class);
    }
}
