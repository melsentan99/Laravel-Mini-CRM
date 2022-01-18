<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\Employee;
use App\Http\Requests\EmployeeCreateRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use DataTables;
use symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {     
        $listCompany = Company::pluck('name', 'id');
    
        if ($request->ajax()) 
        {
            $data = Employee::all();


            return Datatables::of($data)
                    ->editColumn('created_at', function($row) {
                     return $row->created_at->timezone(auth()->user()->timezone)->toDateTime();
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {

                           $action_btn = '<a href="'.route('employee.show', $row->id).'" class="btn btn-primary btn-sm">Detail</a>';
                           return $action_btn;           
                    })
                    ->rawColumns(['action'])
                    ->make(true);
           
        }

        
        return view('employees.index', compact('listCompany'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeCreateRequest $request)
    {

        $newEmployee = $request->validated();

        Employee::create($newEmployee,$request);


        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee, Company $company)
    {
        $company = Company::find($company);
        $employee = Employee::find($employee);
        return view('employees.show', compact('employee', 'company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $listCompany = Company::pluck('name', 'id');
        return view ('employees.edit', compact('employee', 'listCompany'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    { 
        
        $request->validate([
            'first_name'  => 'required',
            'last_name' => 'required',
            'company_id' => 'required|numeric|exists:companies,id',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $employee->update($request->all());

        return redirect()->route('employee.show', $employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        Employee::destroy($employee->id);
        return redirect()->route('employee.index');
    }

    public function apiShowEmployee(Request $request, Company $company)
    {
        $employees = $company->employee;
        $data = compact('employees');
        $payload = JWTAuth::getPayLoad($request->token)->toArray();
        $companyId = explode("/", $request->getPathInfo())[1];
        if ($payload['sub'] != $companyId) {
            return response()->json(['status' => 'Not Authorized']);
        }
        return response()->json($data, 200);
    }

    public function tes()
    {
        $data = "Employee";
        return response()->json(compact('data'),200);

    }
}
