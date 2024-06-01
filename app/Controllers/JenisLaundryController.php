<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class JenisLaundryController extends BaseController
{
    public function index()
    {
        return view('jenis_laundry');
    }
}
