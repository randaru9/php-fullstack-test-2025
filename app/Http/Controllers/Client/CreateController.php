<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Client\BaseController;
use App\Http\Requests\Client\CreateRequest;
use Illuminate\Http\JsonResponse;
use App\Helpers\Response;

class CreateController extends BaseController
{
    public function action(CreateRequest $request): JsonResponse
    {

        [
            'name' => $name,
            'slug' => $slug,
            'is_project' => $is_project,
            'self_capture' => $self_capture,
            'client_prefix' => $client_prefix,
            'client_logo' => $client_logo,
            'address' => $address,
            'phone_number' => $phone_number,
            'city' => $city
        ] = $request;
        
        $category = $this->clientService->create($name, $slug, $is_project, $self_capture, $client_prefix, $client_logo, $address, $phone_number, $city);

        $response = new Response(Response::CREATED, 'Buat Client Berhasil');

        if (!$category instanceof \Exception) {
            $response->set(data: $category->toArray());
        } else {
            $response->set(Response::INTERNAL_SERVER_ERROR, 'Buat Client Gagal', $category);
        }

        return $response->get();
    }
}
