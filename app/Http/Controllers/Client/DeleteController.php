<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\JsonResponse;
use App\Helpers\Response;

class DeleteController extends BaseController
{
    public function action(string $slug): JsonResponse
    {
        $client = $this->clientService->getBySlug($slug);

        $response = new Response(message: 'Hapus client Berhasil');

        if ($client !== null) {
            $this->clientService->delete($client, $slug);
        } else {
            $response->set(Response::NOT_FOUND, 'Data client tidak dapat ditemukan');
        }

        return $response->get();
    }
}
