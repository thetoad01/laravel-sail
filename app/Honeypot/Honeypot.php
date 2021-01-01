<?php

namespace App\Honeypot;

use Closure;
use Illuminate\Http\Request;

class Honeypot
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $config = config('honeypot');

        // dd($config);

        if (! $request->has($config['field_name'])) {
            $this->abort();
        }
    
        if (! empty($request->input($config['field_name']))) {
            $this->abort();
        }
        
        if ($this->timeToSubmitForm($request) <= $config['minimum_time']) {
            $this->abort();
        }

        return $next($request);
    }

    protected function timeToSubmitForm(Request $request)
    {
        return microtime(true) - $request->input( config('honeypot.field_time_name') );
    }

    protected function abort()
    {
        abort(404, 'Spam detected.');
    }
}
