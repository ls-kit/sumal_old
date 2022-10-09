<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Osiset\ShopifyApp\Http\Middleware\Billable;

class CustomBillable extends Billable
{
    use ShopifyApiTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Config::get('shopify-app.billing_enabled')=== true){
            $shop = auth()->user();
            if(!$shop->isFreemium() && !$shop->isGrandfathered() && $shop->plan == null){
                return redirect()->route('plans');
            }
        }

        return $next($request);
    }
}
