<?php

namespace MbcApiContent\Providers;

use Illuminate\Support\Collection;

use MbcApiContent\App\Bootstrap;
use MbcApiContent\App\Entity\Collections\LaravelRouteCollection;
use MbcApiContent\App\Entity\Collections\LaravelRouteCollectionInterface;
use MbcApiContent\App\Entity\Collections\RouteEntityCollection;
use MbcApiContent\App\Entity\Collections\RouteEntityCollectionInterface;
use MbcApiContent\App\Facades\RouterFacade;
use MbcApiContent\App\Models\Page;
use MbcApiContent\App\Models\Route as RouteModel;
use MbcApiContent\App\Models\Template;
use MbcApiContent\App\Services\RenderService;
use MbcApiContent\App\Services\RenderServiceInterface;
use MbcApiContent\App\Services\RouterService;
use MbcApiContent\App\Services\RouterServiceInterface;
use Illuminate\Support\ServiceProvider;
use MbcApiContent\config\ApiContentConfig;


class InstallServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
// https://laravel.com/docs/9.x/packages

         //https://laravel.com/docs/9.x/eloquent-resources

        if ($this->app->runningInConsole()) {

            $this->install();
        }

    }

    public function install()
    {

        try{
            $this->generateSwaggerJsonFromJinja();

            $this->publishes([
                __DIR__.'/../config/mbc-api-content-config.php' => config_path('mbc-api-content-config.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../public/api/' => public_path('api/'),
            ], 'public');

            $this->publishes([
                __DIR__.'/../resources/views/api_content/' => resources_path('views/api_content/'),
            ], 'views');

        }
        catch (\Exception $e)
        {
            throw new \Exception('Error installing');
        }
    }



    private function generateSwaggerJsonFromJinja()
    {
        $this->generateFromJinja(
            'openapi.json',
            'public/api/docs/',
            [
                'api_prefix' => config(MainServiceProvider::PACKAGE_NAME)['api']['routes']['prefix'],
            ]
        );
    }


    private function generateFromJinja(string $filename, string $filename_path = '', array $datas = [])
    {
        $filename_path = __DIR__ . '/./../' . $filename_path;

        $file_jinja_content = file_get_contents($filename_path.$filename . 'j2');

        $data_parsed = str_replace(
            array_map(function($k){return "{{" . $k . "}}";}, array_keys($datas)), // 'varname' -> '{{varname}}'
            array_values($datas),
            $file_jinja_content
        );

        $myfile = fopen($filename_path . $filename, "w") or die("Unable to open file!");
        fwrite($myfile, $data_parsed);
        fclose($myfile);

      //  unlink($public_path.$file_jinja);
    }

}
