<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\Client\ClientService;

class BaseController extends Controller
{
    public function __construct(
        public ClientService $clientService
    ) {
    }
}
