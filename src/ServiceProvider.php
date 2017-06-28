<?php

namespace Mschlueter\Backend;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {

        // Load config file
        $config_file = __DIR__ . '/../config/backend.php';

        $this->mergeConfigFrom($config_file, 'backend');

        $this->publishes([
            $config_file => config_path('backend.php')
        ], 'backend');
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {

        $this->setRouting();

        $views_path = __DIR__ . '/../views';
        $this->loadViewsFrom($views_path, 'backend');
    }

    protected function setRouting() {

        $routeConfig = [
            'namespace' => 'Mschlueter\Backend\Controllers',
            'prefix' => $this->getConfig()->get('backend.route_prefix'),
            'middleware' => 'web',
        ];

        $this->getRouter()->group($routeConfig, function($router) {

            /* @var $router \Illuminate\Routing\Router */

            $router->get('', [
                'uses' => 'HomeController@indexAction',
                'as' => 'backend.home',
            ]);

            $router->get('login', [
                'uses' => 'Auth\LoginController@showLoginForm',
                'as' => 'backend.login',
            ]);

            $router->post('login', [
                'uses' => 'Auth\LoginController@login',
//                'as' => 'backend.login',
            ]);

            $router->post('logout', [
                'uses' => 'Auth\LoginController@logout',
                'as' => 'backend.logout',
            ]);

            $router->post('password/email', [
                'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail',
                'as' => 'backend.password.email',
            ]);

            $router->get('password/reset', [
                'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm',
                'as' => 'backend.password.request',
            ]);

            $router->post('password/reset', [
                'uses' => 'Auth\ResetPasswordController@reset',
//                'as' => 'backend.password.reset',
            ]);

            $router->get('password/reset/{token}', [
                'uses' => 'Auth\ResetPasswordController@showResetForm',
                'as' => 'backend.password.reset',
            ]);

            $router->get('register', [
                'uses' => 'Auth\RegisterController@showRegistrationForm',
                'as' => 'backend.register',
            ]);

            $router->post('register', [
                'uses' => 'Auth\RegisterController@register',
//                'as' => 'backend.register',
            ]);
        });
    }

    /**
     * Get the current config.
     *
     * @return \Illuminate\Config\Repository
     */
    protected function getConfig()
    {
        return $this->app['config'];
    }

    /**
     * Get the active router.
     *
     * @return \Illuminate\Routing\Router
     */
    protected function getRouter()
    {
        return $this->app['router'];
    }
}
