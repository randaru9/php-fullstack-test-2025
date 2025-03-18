<?php

namespace App\Http\Services\Client;

use App\Http\Services\Service;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientService extends Service
{
    public function create($name, $slug, $is_project, $self_capture, $client_prefix, $client_logo, $address, $phone_number, $city): Client|\Exception
    {
        DB::beginTransaction();

        try {

            $client = Client::create([
                'name' => $name,
                'slug' => $slug,
                'is_project' => $is_project,
                'self_capture' => $self_capture,
                'client_prefix' => $client_prefix,
                'address' => $address,
                'phone_number' => $phone_number,
                'city' => $city
            ]);

            if ($client_logo) {
                $logoPath = $client->uploadLogo($client_logo);
                $client->client_logo = $logoPath;
                $client->save();
            }

			DB::commit();

            return $client;

        } catch (\Exception $e) {

			DB::rollBack();
            
            return $e;

        }
    }
}
