<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" disabled value="{{ $student->name }}" name="name" id="name"
                placeholder="Full Name">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="roll_no">Roll Number</label>
            <input type="number" disabled name="roll_no" value="{{ $student->roll_no }}" class="form-control"
                id="roll_no" placeholder=" Roll Number">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="class">Class</label>
            <input type="number" disabled name="roll_no" value="{{ $student->class }}" class="form-control"
                id="class" placeholder="Class">
        </div>
    </div>
</div>
@if (!empty($student->subjects))
    @foreach ($student->subjects as $count => $subject)
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="subject_name">Subject Name</label>
                    <input type="text" readonly name="subject[{{ $count }}][name]" value="{{ $subject }}"
                        class="form-control" id="subject_name" placeholder="Subject">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="subject_marks">Enter Marks</label>
                    <input type="text" name="subject[{{ $count }}][marks]" class="form-control"
                        id="subject_marks" placeholder="Enter Marks">
                </div>
            </div>
        </div>
    @endforeach
@endif
