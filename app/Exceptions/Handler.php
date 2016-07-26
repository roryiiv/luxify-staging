<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use DB;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */

    public function render($request, Exception $e)
    {
      if ($e instanceof NotFoundHttpException) {
        $mores = DB::table('listings')
        ->where('status', 'APPROVED')
        ->join('countries', 'countries.id', '=', 'listings.countryId')
        ->leftJoin('users', 'listings.userId', '=', 'users.id')
        ->select('listings.mainImageUrl', 'listings.title', 'listings.id','listings.title', 'listings.currencyId', 'listings.price', 'countries.name as country', 'users.companyLogoUrl', 'users.slug', 'users.fullName')
        ->paginate(10);

        return response()->view('exception.missing', ['mores' => $mores], 404);
      } else {
        return parent::render($request, $e);
      }
    }
}
