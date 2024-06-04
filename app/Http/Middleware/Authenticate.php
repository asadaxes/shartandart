<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
//        return $request->expectsJson() ? null : route('user.login');
//        return $request;
        $client = new Client();
        try {
//            return 'sarowar';
//            $response = $client->get('http://aaait.tech/api/asad/developerkey');
//            $data = json_decode($response->getBody(), true);
//            $developerKey = $data['developerkey'] ?? null;
//            $predefinedKey = "azizulhaque4584198rita123456789";
//            if ($developerKey === $predefinedKey) {
                if ($request->is('user/dashboard')) {
                    return route('user.login');
                } elseif ($request->is('admin/dashboard')) {
                    return route('login');
                } else {
//                    return 'else';
                    return $request->expectsJson() ? null : route('user.login');
                }
//            } else {
//                return response()->json(['message' => 'Add Developer Key First'], 401);
//            }
        } catch (\Exception $e) {
            logger()->error('Error fetching developer key: ' . $e->getMessage());
            return null;
        }
    }
}
