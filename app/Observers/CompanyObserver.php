<?php

namespace App\Observers;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyObserver
{
    public function creating(Company $company)
    {
    	$company->created_by_id = Auth::user()->id;
    	
    }

    public function updating(Company $company)
    {
    	$company->updated_by_id = Auth::user()->id;
    }
}
