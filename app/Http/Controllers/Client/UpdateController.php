<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\UpdateRequest;
use Illuminate\Http\JsonResponse;
use App\Helpers\Response;

class UpdateController extends BaseController
{
    public function action(UpdateRequest $request, string $slug): JsonResponse
    {
        $response = new Response(message: 'Edit Client Berhasil');

        $client = $this->clientService->getBySlug($slug);

        if ($client !== null) {

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

            $this->clientService->update(
                client: $client,
                name: $name,
                slug: $slug,
                is_project: $is_project,
                self_capture: $self_capture,
                client_prefix: $client_prefix,
                client_logo: $client_logo,
                address: $address,
                phone_number: $phone_number,
                city: $city
            );

        } else {
            $response->set(Response::NOT_FOUND, 'Data client tidak dapat ditemukan');
        }

        return $response->get();
    }
}
