<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Mail\NewCompany;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Storage;
use DataTables;
use Mail;
use Tymon\JWTAuth\Facades\JWTAuth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Company::all();
            // foreach ($data as $d) {
            //     $d->created_at =  \Carbon\Carbon::parse($d->created_at->timezone(auth()->user()->timezone))->toDateTime();
            // }

            return Datatables::of($data)
                    ->editColumn('created_at', function($row) {
                     return $row->created_at->timezone(auth()->user()->timezone)->toDateTime();
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
 
                           $action_btn = '<a href="'.route('company.show', $row->id).'" class="btn btn-primary btn-sm">Detail</a>';
                           return $action_btn;
                           
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        } 

        return view('companies.index');
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
        if($request->hasFile('logo')) 
        {
            $originalName = $request->file('logo')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileSave = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('logo')->storeAs('images', $fileSave);
        }
        else
        {
            $fileSave = 'noimage.jpg';
        }   
        
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->logo = $fileSave;
        $company->save();

        // \Mail::('Welcome'.$company->first_name, function ($message) use($company) {
        //     $message->to($company->email, $company->first_name);
        //     $message->subject('Welcome');
        // });

        if ($request->has('email')) {
            $details = [
                'email' => $request->email,
                'title' => 'Mail From Mini-CRM',
                'body' => 'Congratulations your company has been addded to mini-CRM.'
            ];
            dispatch(new SendEmailJob($details));
        }
       
        // Mail::to($company)->queue(new SendEmailJob($company));

        return redirect()->route('company.index', $company);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        
        $company = Company::find($company);

        

        
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view ('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        
        $request->validate([
            'name'  => 'required',
            'email' => 'required',
            'website' => 'required',
        ]);

        // Company::where('id', $company->id)
        //     ->update([
        //         'name'  => $request->name,
        //         'email' => $request->email,
        //         'website' => $request->website,
        //     ]);

        $company->update($request->all());
        if($request->hasFile('logo')) 
        {
            Storage::delete($company->logo);
            $request->file('logo')->storeAs('public/',$request->file('logo')->getClientOriginalName());
            $company->logo = $request->file('logo')->getClientOriginalName();
            $company->save();
        }
        dd($company);
        return redirect()->route('company.show', compact('company'));
        // return redirect()->route('company.show', $company->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Company::destroy($company->id);
        return redirect()->route('company.index');
    }

    public function generateCompanyToken(Company $company)
    {
        $token = JWTAuth::fromUser($company);
        $company->update(['token' => $token]);
        return response()->json($token, 200);
    }

    public function showEmployees(Request $request, Company $company, Employee $employee)
    {
        if ($request->ajax()) {
            $data = Employee::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
 
                           $action_btn = '<a href="'.route('company.show', $row->id).'" class="btn btn-primary btn-sm">Detail</a>';
                           return $action_btn;
                           
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        dd($data);
        } 
        return view('companies.showEmployees', compact('company', 'employee'));
    }

    public function whatsapp()
    {
        $cookie = '/curl/cookie.txt';


        $url = "https://web.whatsapp.com/";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt ($ch, CURLOPT_COOKIEJAR, getcwd() .$cookie); 
        curl_setopt ($ch, CURLOPT_COOKIEFILE, getcwd() .$cookie);
        $data1 = curl_exec($ch);

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($data);
        $tags = $dom->getElementsByTagName('div');
        for($i = 0; $i < $tags->length; $i++) {
            $grab = $tags->item($i);
            if($grab->getAttribute('class') === '_3Bc7H _20c87') {
                $img = $grab->getAttribute('value');
            }
        }
     


        $data = array
        (
            "wa_beta_version" => "production",
            "wa_lang_pref" => "en",
            // "wa_csrf" =>
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://web.whatsapp.com/login");
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() .$cookie); 
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() .$cookie);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        $data2 = curl_exec($ch);
        curl_close($ch);

        echo $data2;
    }
}
