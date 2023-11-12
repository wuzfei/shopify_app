<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Shopify\Context;
use Shopify\Utils;

class MustShop
{
    /**
     * Ensures that the request is setting the appropriate CSP frame-ancestor directive.
     *
     * See https://shopify.dev/docs/apps/store/security/iframe-protection for more information
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $shop = Utils::sanitizeShopDomain($request->query('shop', ''));
        if ($shop) {
            $response = $next($request);
        } else {
            $response = redirect("/home");
        }
        return $response;
    }
}
