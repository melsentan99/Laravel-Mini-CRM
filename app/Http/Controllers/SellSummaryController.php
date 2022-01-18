<?php

namespace App\Http\Controllers;

use App\Models\SellSummary;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Sell;
use Illuminate\Http\Request;

class SellSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellSummary = SellSummary::all();
        $company = Company::all();
        $employee = Employee::all();
        $sells = SellSummary::join('employees', 'employees.id', '=', 'sell_summaries.employee')
            ->join('companies', 'companies.id', '=', 'employees.company_id')
            ->get(['sell_summaries.*', 'employees.company_id', 'employees.first_name', 'employees.last_name', 'companies.name']);

        return view('sellSummaries.index', compact('sells', 'company', 'sellSummary', 'employee'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function summaryPerEmployee($id)
    {
        $data = [
            'sells' => Sell::join('items', 'items.id', '=', 'sells.item')
                ->join('employees', 'employees.id', '=', 'sells.employee')
                ->where('employee', $id)
                ->get(['sells.*', 'items.name', 'employees.first_name', 'employees.last_name']),
            'sells_summaries' => SellSummary::join('employees', 'employees.id', '=', 'sell_summaries.employee')
                ->where('employee', $id)
                ->get(['sell_summaries.*', 'employees.first_name', 'employees.last_name']),
            'employee' => Employee::find($id)
        ];
        return view('sellSummaries.showDetailEmployee', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellSummary  $sellSummary
     * @return \Illuminate\Http\Response
     */
    public function show(SellSummary $sellSummary, Request $request)
    {
        $from = $request->min;
        $to = $request->max;
        $company = $request->company_id;
        $result = null;
        if ($company === null) {
            $result = SellSummary::join('employees', 'employees.id', '=', 'sell_summaries.employee')
                ->join('companies', 'companies.id', '=', 'employees.company_id')
                ->whereBetween('date', [$from, $to])
                ->whereRaw("concat(employees.first_name, ' ', employees.last_name) like '%" . $request->employee . "%' ")
                ->get(['sell_summaries.*', 'employees.company_id', 'employees.first_name', 'employees.last_name', 'companies.name']);
        }
        if ([$from, $to] === null) {
            $result = SellSummary::join('employees', 'employees.id', '=', 'sell_summaries.employee')
                ->join('companies', 'companies.id', '=', 'employees.company_id')
                ->where('companies.name', $request->company_id)
                ->whereRaw("concat(employees.first_name, ' ', employees.last_name) like '%" . $request->employee . "%' ")
                ->get(['sell_summaries.*', 'employees.company_id', 'employees.first_name', 'employees.last_name', 'companies.name']);
        }
        else 
        {
            $result = SellSummary::join('employees', 'employees.id', '=', 'sell_summaries.employee')
                ->join('companies', 'companies.id', '=', 'employees.company_id')
                ->whereBetween('date', [$from, $to])
                ->where('companies.name', $request->company_id)
                ->whereRaw("concat(employees.first_name, ' ', employees.last_name) like '%" . $request->employee . "%' ")
                ->get(['sell_summaries.*', 'employees.company_id', 'employees.first_name', 'employees.last_name', 'companies.name']);
        }


        $data = [
            'from' => $from,
            'to' => $to,
            'result' => $result
        ];
        return view('sellSummaries.show', $data);
    }

}
