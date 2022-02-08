<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentMarksheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MarkSheetController extends Controller
{
    public  function index(Request $request)
    {
        if ($request->ajax()) {
            $data = StudentMarksheet::Select('*')
                ->with([
                    'student_data' => function ($q) {
                        $q->select('*');
                    }
                ])->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-target="#model-view" data-tab="#student-' . $row->id . '" data-request="ajax-popup" data-url="' . url('marksheet/' . $row->id) . '" class="edit btn btn-primary btn-sm">View</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('mark_sheet.index');
    }

    public  function create(Request $request)
    {
        $data['students'] = Student::get();
        return view('mark_sheet.create', $data);
    }

    public  function student_details(Request $request)
    {
        $student = Student::where('id', $request->student_id)->first();
        if (!empty($student)) {
            return response()->json([
                'status' => true,
                'html' => view("mark_sheet.student_details", ['student' => $student])->render()
            ]);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'student_id' => 'required|unique:student_marksheets',
                'subject.*.marks' => 'required',
            ],
            [
                'subject.*.marks.required' => 'The subject marks field is required'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'message' => $validator->errors(),

            ]);
        } else {
            $student = new StudentMarksheet();
            $student->student_id = $request->student_id;
            $sub = [];
            $total = 0;
            if (!empty($request->subject)) {
                foreach ($request->subject as $key => $subject_data) {
                    $sub[$key]['subject_name'] = $subject_data['name'];
                    $sub[$key]['subject_marks'] = $subject_data['marks'];
                    $total += $subject_data['marks'];
                }
            }
            $student->subject_marks = $sub;
            $student->total_marks = $total;
            $student->created_by = Auth::user()->id;
            $student->updated_by = Auth::user()->id;
            $student->save();
            \Session::flash('message', 'Marksheet added Successfully!');
            \Session::flash('alert-class', 'alert-success');
            return response()->json([
                'status' => true,
                'modal' => true,
                'redirect' => url('marksheet'),
                'message' => "Added Maksheet Successfully"
            ]);
        }
    }
    public function show($id)
    {
        $student = StudentMarksheet::Select('*')
            ->with([
                'student_data' => function ($q) {
                    $q->select('*');
                }
            ])->where('id', $id)->first();
        return response()->json([
            'status' => true,
            'html' => view('mark_sheet.show', ['student' => $student])->render()
        ]);
    }

    public function getStudents()
    {
        try {
            $student_data = StudentMarksheet::Select('*')
                ->with([
                    'student_data' => function ($q) {
                        $q->select('*');
                    }
                ])->orderBy('total_marks', 'desc')->get();
            $stu = [];
            if (!empty($student_data)) {
                foreach ($student_data as $key => $student) {
                    $stu[$key]['name'] = $student->student_data->name;
                    $stu[$key]['roll_no'] = $student->student_data->roll_no;
                    $stu[$key]['photo_url'] = url($student->student_data->passport_photo);
                    $stu[$key]['class'] = $student->student_data->class;
                    $stu[$key]['total_marks'] = $student->total_marks;
                    $stu[$key]['subject_details'] = $student->subject_marks;
                }
            }

            //  dd($student_data);
            return response()->json([
                'success' => true,
                'status_code' => 200,
                'status' => true,
                'data' => $stu
            ]);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return response()->json([
                'success' => false,
                'status_code' => 500,
                'status' => false,
                'data' => $e->getMessage()
            ]);
        }
    }
}
