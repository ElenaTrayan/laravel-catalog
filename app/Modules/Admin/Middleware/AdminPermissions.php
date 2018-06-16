<?php
/**
 * Created by PhpStorm.
 * User: DianaElena
 * Date: 07.10.2017
 * Time: 0:13
 */
namespace App\Modules\Admin\Middleware;
use App\Helpers\Errors;
use Closure;
class AdminPermissions
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && !$request->user()->isAdmin()) {
            return redirect('/');
        }

        return $next($request);
    }
}