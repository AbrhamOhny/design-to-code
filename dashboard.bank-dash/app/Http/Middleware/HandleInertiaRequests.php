<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $to_return = [
            'routeName' => $request->route()?->getName(),
            'currentUrl' => url()->current(),
        ];
        if (auth()->check()) {
            $to_return = array_merge($to_return, [
                'user' => Auth::user()?->load([
                    'information',
                    'preference',
                    'security',
                    'investment',
                    'card',
                    'loan',
                    'receiver',
                ]),
                'dashboardRoutes' => [
                    'home' => route('overview'),
                    'transactions' => route('transactions'),
                    'accounts' => route('accounts'),
                    'investments' => route('investments'),
                    'cards' => route('credit cards'),
                    'loans' => route('loans'),
                    'services' => route('services'),
                    'privileges' => route('privileges'),
                    'settings' => route('settings'),
                    'deauthenticate' => route('deauthenticate'),
                ],
            ]);
        }
        return array_merge(parent::share($request), $to_return);
    }
}
