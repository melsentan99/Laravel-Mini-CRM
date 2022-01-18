<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use DataTables;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	
    	if ($request->ajax()) {
    		$data = Item::all();
            // foreach ($data as $d) {
            //     $d->created_at =  \Carbon\Carbon::parse($d->created_at->timezone(auth()->user()->timezone))->toDateTime();
            // }
    		
            return Datatables::of($data)
                    ->editColumn('created_at', function($row) {
                     return $row->created_at->timezone(auth()->user()->timezone)->toDateTime();
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
 
                           $action_btn = '<a href="'.route('items.show', $row->id).'" class="btn btn-primary btn-sm">Detail</a>';
                           return $action_btn;
                           
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    	}
    	return view('items.index');
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
    public function store(Request $request)
    {
    	$request->validate([
    		'name'	=> 'required',
    		'price' => 'required|numeric',
    	]);

    	Item::create([
    		'name'	=> $request->name,
    		'price' => $request->price,
    	]);

    	return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $items = Item::find($item);
        return view('items.show', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view ('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name'  => 'required',
            'price' => 'required|numeric',
        ]);

        $item->update($request->all());

        return redirect()->route('items.show', $item);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        Item::destroy($item->id);
        return redirect()->route('items.index');
    }
}
