@extends('layouts.master')
@push('plugin-styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item "><a href="{{ url('student') }}">Student List</a></li>
                            <li class="breadcrumb-item active"><a href="#">Student Create</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Student Manage</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-3">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Create Student</h3>
                                    </div>
                                    <form action="{{ asset('student') }}" role="student-create" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">Enter Full Name</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Enter Full Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="roll_no">Enter Roll Number</label>
                                                <input type="number" name="roll_no" class="form-control" id="roll_no"
                                                    placeholder="Enter Roll Number">
                                            </div>
                                            <div class="form-group">
                                                <label>Select Subject (max 5)</label>
                                                <div class="select2-purple">
                                                    <select class="select2" name="subjects[]" multiple="multiple"
                                                        data-placeholder="Select Subject"
                                                        data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                        <option>English</option>
                                                        <option>Hindi</option>
                                                        <option>Kannada</option>
                                                        <option>Math</option>
                                                        <option>Physics</option>
                                                        <option>Chemistry</option>
                                                        <option>Biology</option>
                                                        <option>Enviroment</option>
                                                        <option>social studies</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Select Class</label>
                                                <div class="">
                                                    <select class="form-control" name="class" style="width: 100%;">
                                                        @for ($i = 1; $i <= 12; $i++)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="passport_photo">Passport Size Photo</label>
                                                <div class="">
                                                    <input type="file" name="passport_photo" class="form-control"
                                                        id="passport_photo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ url('student') }}" class="btn btn-danger">Cancel</a>
                                            <button type="button" data-request="ajax-submit"
                                                data-target='[role="student-create"]'
                                                class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
@endpush
@push('custom-scripts')
    <script>
        $(function() {
            $('.select2').select2({
                maximumSelectionLength: 5
            })
        });
    </script>
@endpush
