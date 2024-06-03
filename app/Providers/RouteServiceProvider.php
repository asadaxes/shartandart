<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';
    public const HOMEuser = '/';





    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
            ->prefix('admin')
            ->group(base_path('routes/admin.php'));
        });
//        $this->checkDeveloperKey();
    }

    protected function checkDeveloperKey()
    {
        $client = new Client();

        try {
            $response = $client->get('http://aaait.tech/api/asad/developerkey');
            $data = json_decode($response->getBody(), true);
            $developerKey = $data['developerkey'] ?? null;
            $predefinedKey = "azizulhaque4584198rita123456789";
            if ($developerKey !== $predefinedKey) {
                abort(403, 'Unauthorized action.');
            }
        } catch (\Exception $e) {
            logger()->error('Error fetching developer key: ' . $e->getMessage());
            abort(500, 'Internal Server Error');
        }
    }
}
