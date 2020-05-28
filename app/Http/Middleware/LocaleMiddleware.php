<?php
namespace App\Http\Middleware;
use Closure;
use Carbon\Carbon;
class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
 /*
         * Locale esta activado
         */
        if (config('locale.status')) {
            if (session()->has('locale') &&
                in_array(session()->get('locale'), array_keys(config('locale.languages')))) {
                /*
                 * Establece el locale de Laravel
                 */
                app()->setLocale(session()->get('locale'));
                /*
                 * setLocale para php. Activa ->formatLocalized() con valores localized para fecha
                 */
                setlocale(LC_TIME, config('locale.languages')[session()->get('locale')][1]);
                /*
                 * setLocale para usar locales de Carbon. Activa el diffForHumans() localized
                 */
                Carbon::setLocale(config('locale.languages')[session()->get('locale')][0]);
                /*
                 * Establece la variable de sesión si tiene soporte RTL
                 */
                if (config('locale.languages')[session()->get('locale')][2]) {
                    session(['lang-rtl' => true]);
                } else {
                    session()->forget('lang-rtl');
                }
            }
        }
        return $next($request);
    }
}