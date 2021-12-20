<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::get();
        return view('mantenimiento.empleado.index',compact('employee'));
    }
}
