<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sell;
use App\Models\SellSummary;
use App\Models\Item;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use DataTables;
use symfony\Component\HttpFoundation\Response;


class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	
    	$listItem = Item::all();
    	$listEmployee = Employee::all();
    	$sell = Sell::join('items', 'items.id', '=', 'sells.item')
    		->join('employees', 'employees.id', '=', 'sells.employee')
    		->get(['sells.*', 'items.name', 'employees.first_name', 'employees.last_name']);
    	// dd($sell);
    	$data = [
    		'items' => $sell
    	];

    	if ($request->ajax())
    	{
    		$data = Sell::all();

	    	return Datatables::of($data)
	    		->editColumn('employee', function($row) {
	    			DB::raw("CONCAT(employees.first_name,' ',employees.last_name");
	    		})
	    		->editColumn('created_at', function($row) {
	    			return $row->created_at->timezone(auth()->user()->timezone)->toDateTime();
	    		})
	    		->addIndexColumn()
	    		->addColumn('action', function($row) {
	                   $action_btn = '<a href="'.route('sells.show', $row->id).'" class="btn btn-primary btn-sm">Detail</a>';
	                   return $action_btn;  
	    		})
	    		->rawColumns(['action'])
	    		->make(true);

    	}
    	return view('sells.index', $data, compact('listItem', 'listEmployee'));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'item'		=> 'required',
    		'price'		=> 'required|numeric',
    		'discount'	=> 'required|numeric',
    		'employee'	=> 'required',
    	]);

    	Sell::create([
    		'item'		=> $request->item,
    		'price'		=> $request->price,
    		'discount'	=> $request->discount,
    		'employee'	=> $request->employee,
    		'created_date' => Carbon::now()
    	]);

    	$sell = SellSummary::where('employee', $request->employee)->first();
    	if (!$sell) {
    		SellSummary::create([
    			'date' 		=> carbon::now(),
    			'employee'	=> $request->employee,
    			'created_date' => Carbon::now(),
    			'last_update'  => Carbon::now(),
    			'price_total'  => $request->price,
    			'discount_total' => ($request->discount / 100) * $request->price,
    			'total'		=> $request->price - (($request->discount / 100) * $request->price)
    		]);
    	}

    	return redirect('sells');
    }

    public function show(Sell $sell)
    {
    	$sell = Sell::find($sell);
        $sell2 = Sell::join('items', 'items.id', '=', 'sells.item')
            ->join('employees', 'employees.id', '=', 'sells.employee')
            ->get(['sells.*', 'items.name', 'items.price', 'employees.first_name', 'employees.last_name']);

        $data = [
            'sell'  => $sell,
            'sell2' => $sell2
        ];
    	return view('sells.show', $data);
    }

    public function edit($id)
    {
        $sell = Sell::find($id);
        $listEmployee = Employee::all();  
        $listItem = Item::all();  
        return view('sells.edit', compact('sell', 'listEmployee', 'listItem'));
    }

    public function update(Request $request, $id)
    {
        $sell = Sell::find($id);
        $request->validate([
            'item'      => 'required',
            'price'     => 'required|numeric',
            'discount'  => 'required',
            'employee'  => 'required',
        ]);

        $sell->update([
            'item' => $request->item,
            'price' => $request->price,
            'discount' => $request->discount,
            'employee' => $request->employee,
        ]);
        
        return redirect()->route('sells.index', $sell);
    }

    public function destroy(Sell $sell)
    {
        Sell::destroy($sell->id);
        return redirect()->route('sells.index');
    }
}



