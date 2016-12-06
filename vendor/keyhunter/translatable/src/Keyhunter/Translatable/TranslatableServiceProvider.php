<?php namespace Keyhunter\Translatable;

use Illuminate\Support\ServiceProvider;
use Keyhunter\Administrator\Exception;

class TranslatableServiceProvider extends ServiceProvider
{
    protected $package = 'keyhunter/translatable';

    public function boot()
    {
        $this->publishes([
            base_path('vendor/' . $this->package . '/src/config/config.php') => config_path('translatable.php')
        ]);
    }

    /**
     * Register the service provider.
     *
     * @throws Exception
     * @return void
     */
    public function register()
    {
        if (!(($config = base_path('vendor/' . $this->package . '/src/config/config.php')) && file_exists($config)))
            if (!(($config = __DIR__ . '/../../config/config.php') && file_exists($config)))
                throw new Exception('Cannot find translatable/config.php');

        $this->mergeConfigFrom($config, 'translatable');
    }
}
