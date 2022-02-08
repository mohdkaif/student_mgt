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
                            <li class="breadcrumb-item "><a href="{{ url('marksheet') }}">Student Marksheet List</a></li>
                            <li class="breadcrumb-item active"><a href="#">Student Marksheet Create</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Student Marksheet Manage</h3>

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
                                        <h3 class="card-title">Create Student Marksheet</h3>
                                    </div>
                                    <form action="{{ asset('marksheet') }}" role="marksheet-create" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Select Student</label>
                                                <div class="">
                                                    <select class="form-control" id="student_id" name="student_id" style="width: 100%;">
                                                        <option value="">Select Student
                                                        </option>
                                                        @if (!empty($students))
                                                            @foreach ($students as $student)
                                                                <option value="{{ $student->id }}">{{ $student->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" id="student_details">
                                            </div>
                                            
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ url('marksheet') }}" class="btn btn-danger">Cancel</a>
                                            <button type="button" data-request="ajax-submit"
                                                data-target='[role="marksheet-create"]'
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
        $('#student_id').on('change', function() {
            $("#cover").show();
            var $formData = new FormData();
            var $this = $(this);
            var $student_id = $(this).val();
            var $url = "{{ url('marksheet/student_details') }}";
            $method = "GET";
            var $newurl = $url + "?student_id=" + $student_id;
            $.ajax({
                url: $newurl,
                type: $method,
                data: $formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function($response) {
                    if ($response.status == true) {
                        $('#student_details').html($response.html);
                    }
                },
            });
            $("#cover").hide();
        });
    </script>
@endpush
