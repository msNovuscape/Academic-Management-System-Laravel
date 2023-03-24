<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BatchTransferController extends Controller
{
    protected $view = 'admin.batch_transfer.';
    protected $redirect = 'batch-transfers';

    public function index()
    {
        return view($this->view.'index');
    }
}
