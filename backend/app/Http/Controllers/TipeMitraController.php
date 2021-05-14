<?php

namespace App\Http\Controllers;

use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use App\Models\TipeMitra;

class TipeMitraController extends Controller
{
    use DisableAuthorization;

    protected $model = TipeMitra::class;
}