<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit75c1dadcc1570080216fbc2da95bb6fe
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit75c1dadcc1570080216fbc2da95bb6fe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit75c1dadcc1570080216fbc2da95bb6fe::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}