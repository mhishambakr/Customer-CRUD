<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::get();
        return view('customers', compact('customers'));
    }

    public function show($id)
    {
        //
        $customer = Customer::where('id','=', $id)->first();
        return view('show', compact('customer'));
    }

    function create(){
        return view('create');
    }
    
    function add(Request $request){

        $validator=\Validator::make($request->all(),
                                   [
                'first_name'=>'required|max:100|min:3',
                'last_name'=>'required|max:100|min:3',
                'email' => 'required|email:rfc,dns|unique:customers,email',
                'password' => ['required',
                'min:8',
                'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/'],
                'phone_number'=>'required|max:11|min:11',
                'site_url'=>'required|max:100|min:7',
                'image'=>'required|image|max:10240'                       
                                   ]);
        
        if ($validator->fails()) {
            return redirect('/customers/create')
                        ->withErrors($validator)
                        ->withInput();
        }


        $image=$request->file('image');
        $imageName = time().$image->getClientOriginalName();
        $img = \Image::make($image->getRealPath());
        $img->resize(350, 350);
        $img->save(public_path('asset/images/customers/'. $imageName));

        $customer = new Customer();
        $customer->first_name=$request->first_name;
        $customer->last_name=$request->last_name;
        $customer->email=$request->email;
        $customer->password=$request->password;
        $customer->phone_number=$request->phone_number;
        $customer->site_url=$request->site_url;
        $customer->image=$imageName;
        $customer-> save();
        return redirect('customers');
    }

    public function edit($id)
    {
        $customer = Customer::where('id', $id)->first();
        return view('edit',compact('customer'));

    }

    public function update(Request $req, $id)
    {
        //
        $customer = Customer::find($id);
        $customer->first_name=$req->first_name;
        $customer->last_name=$req->last_name;
        $customer->password=$req->password;
        $customer->phone_number=$req->phone_number;
        $customer->site_url=$req->site_url;
        $customer-> save();
        return redirect('customers');

    }

    public function changeProfile($id)
    {
        $customer = Customer::where('id', $id)->first();
        return view('changeProfile',compact('customer'));

    }

    public function updateProfile(Request $req, $id)
    {
        //
        $image=$req->file('image');
        $imageName = time().$image->getClientOriginalName();
        $img = \Image::make($image->getRealPath());
        $img->resize(350, 350);
        $img->save(public_path('asset/images/customers/'. $imageName));

        $customer = Customer::find($id);
        $customer->image=$imageName;
        $customer-> save();
        return redirect('customers');
    }

    function delete($id){
        $customer=Customer::find($id);
        $customer->delete();
        return redirect('customers');
    
    }

    public function search_form()
    {   
        return view('search_form');
    }
    
    public function search(Request $request)
    {
        $name = $request->name;
        $customers = Customer::where('first_name','like', $name)->orWhere('last_name', 'like', $name)->get();
        return view('search',compact('customers'));
    }

    
}