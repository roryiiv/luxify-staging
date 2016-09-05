<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\ErrorException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\FatalErrorException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use DB;
use Illuminate\Http\Request;

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
      if ($_SERVER['HTTP_HOST'] === 'www.luxify.com' || $_SERVER['HTTP_HOST'] === 'luxify.com') {
      
        $mores = DB::table('listings') ->where('status', 'APPROVED')
        ->join('countries', 'countries.id', '=', 'listings.countryId')
        ->leftJoin('users', 'listings.userId', '=', 'users.id')
        ->select('listings.mainImageUrl', 'listings.title', 'listings.id','listings.title', 'listings.currencyId', 'listings.price', 'countries.name as country', 'users.companyLogoUrl', 'listings.slug', 'users.fullName')
        ->orderBy('listings.id', ' desc')
        ->paginate(10);

        if ($e instanceof NotFoundHttpException) {

          if ($e instanceof NotFoundHttpException) {
            return response()->view('exception.missing', ['mores' => $mores], 404);
          } else {
            return response()->view('exception.missing', ['mores' => $mores], 500);
          }
        } else if (!$this->isHttpException($e)) {
          $e = new \Symfony\Component\HttpKernel\Exception\HttpException(500); 
          return response()->view('errors.500', ['mores'=> $mores, 'url' => $_SERVER['REQUEST_URI'] ], 500);
        } else {
          return parent::render($request, $e);
        }
      } else {
        return parent::render($request, $e);
      }
    }
}
