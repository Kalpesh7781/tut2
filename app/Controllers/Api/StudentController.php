<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class StudentController extends BaseController
{
    public function index()
    {
        
    }
    public function addstudent()
    {
        return this->respondCreated($response);
    }
}
