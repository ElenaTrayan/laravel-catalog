<?php
/**
*
 */
namespace Modules;
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $modules = config("module.modules");
        while(list(,$module) = each($modules)) {
            if(is_dir(__DIR__. '/' . ucfirst($module). '/Views')) {
                $this->loadViewsFrom(__DIR__. '/' . ucfirst($module) . '/Views', $module);
            }
        }
    }

    public function register()
    {
        $modules = config("module.modules");
        while(list(,$module) = each($modules)) {
            if(file_exists(__DIR__. '/' . ucfirst($module) . '/routes.php')) {
                include __DIR__.  '/' . ucfirst($module) . '/routes.php';
            }
        }
    }
}