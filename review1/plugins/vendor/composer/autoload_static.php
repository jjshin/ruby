<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbbab7c63024b8485877f3a2638df5c10
{
    public static $files = array (
        '34122c0574b76bf21c9a8db62b5b9cf3' => __DIR__ . '/..' . '/cakephp/chronos/src/carbon_compat.php',
        'c720f792236cd163ece8049879166850' => __DIR__ . '/..' . '/cakephp/cakephp/src/Core/functions.php',
        'ede59e3a405fb689cd1cebb7bb1db3fb' => __DIR__ . '/..' . '/cakephp/cakephp/src/Collection/functions.php',
        '90236b492da7ca2983a2ad6e33e4152e' => __DIR__ . '/..' . '/cakephp/cakephp/src/I18n/functions.php',
        'b1fc73705e1bec51cd2b20a32cf1c60a' => __DIR__ . '/..' . '/cakephp/cakephp/src/Utility/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Cake\\Chronos\\' => 13,
            'Cake\\' => 5,
        ),
        'B' => 
        array (
            'Bootstrap\\' => 10,
        ),
        'A' => 
        array (
            'Aura\\Intl\\_Config\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Cake\\Chronos\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/chronos/src',
        ),
        'Cake\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/cakephp/src',
        ),
        'Bootstrap\\' => 
        array (
            0 => __DIR__ . '/..' . '/holt59/cakephp3-bootstrap-helpers/src',
        ),
        'Aura\\Intl\\_Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/intl/config',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 
            array (
                0 => __DIR__ . '/..' . '/psr/log',
            ),
        ),
        'A' => 
        array (
            'Aura\\Intl' => 
            array (
                0 => __DIR__ . '/..' . '/aura/intl/src',
            ),
            'Aura\\Composer\\' => 
            array (
                0 => __DIR__ . '/..' . '/aura/installer-default/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbbab7c63024b8485877f3a2638df5c10::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbbab7c63024b8485877f3a2638df5c10::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitbbab7c63024b8485877f3a2638df5c10::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
