<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\JsonResponse;
use App\Helpers\Response;

class GetAllController extends BaseController
{
    public function action(): JsonResponse
    {
        $client =  $this->clientService->getAll();
        return Response::SetAndGet(message: 'Semua Client Berhasil Didapatkan', data: $client->toArray());
    }
}
