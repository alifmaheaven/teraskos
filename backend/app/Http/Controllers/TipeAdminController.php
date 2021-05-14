<?php

namespace App\Http\Controllers;

use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use App\Models\TipeAdmin;

class TipeAdminController extends Controller
{
    use DisableAuthorization;

    protected $model = TipeAdmin::class;
}