<?php


/**
 * CLASS TO LOAD OTHER CLASS AS SERVICES.
 * 
 * @package SES-Article
 */

namespace inc;


final class Initialize
{
    public static function getServices()
    {
        return [
            controllers\base\Enqueue::class,
            controllers\post\Article::class,
            controllers\post\MetaBoxes::class,
            controllers\post\Column::class,
            controllers\shortcodes\Home::class,
            controllers\shortcodes\News::class,
            controllers\admin\Page::class
        ];
    }


    public static function registerServices()
    {
        foreach (self::getServices() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }


    private static function instantiate($class)
    {
        $service = new $class;
        return $service;
    }
}
