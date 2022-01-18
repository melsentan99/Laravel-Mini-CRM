<?php

namespace App\Observers;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeObserer
{
    public function creating(Employee $employee)
    {
    	$employee->created_by_id = Auth::user()->id;
    	$employee->updated_by_id = Auth::user()->id;
    }

    public function updating(Employee $employee)
    {
    	$employee->updated_by_id = Auth::user()->id;
    }
}
