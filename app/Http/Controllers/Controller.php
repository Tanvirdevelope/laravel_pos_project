<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public $data = [];

    public function __construct()
    {
        $this->data['main_menu'] = 'Users';
        $this->data['sub_menu'] = 'Users';
        $this->data['tab_menu'] = '';

    }
}
