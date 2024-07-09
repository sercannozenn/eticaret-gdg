<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Throwable;
use \Illuminate\Http\RedirectResponse;
trait GdgException
{
    public function exception(Throwable $exception, string $route, string $errorDescription = "Hata alındı"): RedirectResponse
    {
        alert()->error('Başarısız', $errorDescription);

        if ($exception->getCode() == 400)
        {
            return redirect()
                ->back()
                ->withErrors(['slug' => $exception->getMessage()])
                ->withInput();
        }

        Log::error($exception->getMessage(), [$exception->getTraceAsString()]);
        return redirect()->route($route);
    }

    public function jsonException(Throwable $exception, array $data = [], int $statusCode = 500)
    {
        Log::error($exception->getMessage(), [$exception->getTraceAsString()]);

        return response()
            ->json()
            ->setData($data)
            ->setStatusCode($statusCode)
            ->setCharset('utf-8')
            ->header('Content-Type', 'application/json')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);    }
}
