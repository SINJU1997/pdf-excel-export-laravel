<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Rap2hpoutre\FastExcel\FastExcel;



class EmployeeController extends Controller
{
    public static function create(){
        return view('registration');
    }
    public static function store(Request $request){
        $formData=$request->validate([
            'name'=>'required',
            'place'=>'required',
            'designation'=>'required'
        ]);
        Employee::create($formData);
        return redirect('/');
    }
    public static function index(){
        $data=[
            'employees'=>Employee::all()
        ];
        return view('display',$data);
    }
    public static function exportExcel(){
        // Load employees
        $employees = Employee::all();
        // Export all users
        return (new FastExcel($employees))->download('employees.xlsx');
    }
    public static function exportPdf(){
        // Load employees
        $data = [
            'employees'=>Employee::all()
        ];
        $pdf = Pdf::loadView('pdf.employees', $data);
        return $pdf->download('invoice.pdf');

    }

}
