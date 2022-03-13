<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class TestController extends Controller
{
    public function addform(){
        return view('customer.create');
    }
    public function saveData(Request $request){
        $rules = [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:customers' 
        ];
        $errorMessage = [
            "required" => "enter your :attribute Name"
        ];

        Customer::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'email' => strtolower($request->email)
        ]);

        //$this->message('message','Customer created successfully!');
        return redirect('customer/list');

    }
    public function fetchCustomer(){
        $customers = Customer::get();
        return view('customer.index')->with('customers',$customers);
    }
    public function view($id)
    { 
        $customers = Customer::findorfail($id);
        return view('customer.view')->with('customer',$customers);
    }
    public function editform($id)
    { 
        $customers = Customer::findorfail($id);
        return view('customer.edit')->with('customer',$customers);
    }
    public function update(Request $request,$id)
    {
        $customer = Customer::find($id);
      
        $rules = [
          'name' => 'required|min:6',
          'email' => 'required|email|unique:customers'
      ];

      $errorMessage = [
          'required' => 'Enter your :attribute first.'
      ];

      //$this->validate($request, $rules, $errorMessage);
      //dd($customer);  
      $customer->name = $request->name;
      $customer->email = strtolower($request->email);
      $customer->save();          

      //$this->meesage('message','Customer updated successfully!');
      return redirect('customer/list');
    }
    public function delete_customer($id)
    {
      $customer = Customer::find($id); 
      $customer->delete();
      //$this->meesage('message','Customer deleted successfully!');
      return redirect()->back();
    }

    
}
