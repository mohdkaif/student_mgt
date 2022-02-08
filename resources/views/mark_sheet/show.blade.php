<div class="modal fade" id="student-{{ $student->id }}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                <h4 class="modal-title">Student Marksheet</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" disabled
                                value="{{ $student->student_data->name }}" name="name" id="name"
                                placeholder="Full Name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="roll_no">Roll Number</label>
                            <input type="number" disabled name="roll_no" value="{{ $student->student_data->roll_no }}"
                                class="form-control" id="roll_no" placeholder=" Roll Number">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="class">Class</label>
                            <input type="number" disabled name="roll_no" value="{{ $student->student_data->class }}"
                                class="form-control" id="class" placeholder="Class">
                        </div>
                    </div>
                </div>
                @if (!empty($student->subject_marks))
                    @foreach ($student->subject_marks as $count => $subject)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject_name">Subject Name</label>
                                    <input type="text" readonly value="{{ $subject['subject_name'] }}"
                                        class="form-control" id="subject_name" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject_marks">Enter Marks</label>
                                    <input type="text" class="form-control" id="subject_marks" disabled
                                        value="{{ $subject['subject_marks'] }}" placeholder="Enter Marks">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="class">Total Marks</label>
                            <input type="number" disabled name="roll_no" value="{{ $student->total_marks }}"
                                class="form-control" id="class" placeholder="Class">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
