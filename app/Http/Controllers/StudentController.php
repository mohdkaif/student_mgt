<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    public  function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('student.index');
    }

    public  function create(Request $request)
    {
      
        return view('student.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'roll_no' => 'required|unique:students',
            'subjects' => 'required',
            'class' => 'required',
            'passport_photo' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'message' => $validator->errors(),

            ]);
        } else {
            $student = new Student();
            $student->name = $request->name;
            $student->roll_no = $request->roll_no;
            $student->subjects = $request->subjects;
            $student->class = $request->class;
            $student->created_by = Auth::user()->id;
            $student->updated_by = Auth::user()->id;
            $passport_photo = '';
            if (!empty($request->passport_photo)) {
                $passport_photo = upload_file($request, 'passport_photo', 'passport_photo');
            }
            $student->passport_photo = $passport_photo;
            $student->save();
            \Session::flash('message', 'New  Student Added Successfully!');
            \Session::flash('alert-class', 'alert-success');
            return response()->json([
                'status' => true,
                'modal' => true,
                'redirect' => url('student'),
                'message' => "Added Student Successfully"
            ]);
        }
    }
}
