<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit77155c6ad34e411ac2fd79173be536b6
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit77155c6ad34e411ac2fd79173be536b6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit77155c6ad34e411ac2fd79173be536b6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}