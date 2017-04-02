<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8fc8eac52a14ec1f6dbb447e8b3f738b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Parse\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Parse\\' => 
        array (
            0 => __DIR__ . '/..' . '/parse/php-sdk/src/Parse',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8fc8eac52a14ec1f6dbb447e8b3f738b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8fc8eac52a14ec1f6dbb447e8b3f738b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
