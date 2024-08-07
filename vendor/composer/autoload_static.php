<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit45e3d2814e6fb61a35a735a806ad6d5e
{
    public static $prefixLengthsPsr4 = array (
        'i' => 
        array (
            'inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit45e3d2814e6fb61a35a735a806ad6d5e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit45e3d2814e6fb61a35a735a806ad6d5e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit45e3d2814e6fb61a35a735a806ad6d5e::$classMap;

        }, null, ClassLoader::class);
    }
}
