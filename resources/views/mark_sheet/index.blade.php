@extends('layouts.master')
@push('plugin-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                            <li class="breadcrumb-item active">Student MarkSheet</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Student MarkSheet Manage</h3>

                        <div class="card-tools">
                            <a class="btn btn-info" href="{{ url('marksheet/create') }}">Create Student Marksheet</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap data-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Roll No</th>
                                                <th>Total Marks</th>
                                                <th>Class</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div id="model-view">
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@endpush
@push('custom-scripts')
    <script>
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('marksheet') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'student_data.name',
                        name: 'student_data.name'
                    },
                    {
                        data: 'student_data.roll_no',
                        name: 'student_data.roll_no'
                    },
                    {
                        data: 'total_marks',
                        name: 'total_marks'
                    },
                    {
                        data: 'student_data.class',
                        name: 'student_data.class'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        });
        $(document).on("click", '[data-request="ajax-popup"]', function() {
            var $formData = {};
            var $this = $(this);
            var $target = $this.data("target");
            var $tab = $this.data("tab");
            var $url = $this.data("url");
            console.log();
            $.ajax({
                url: $url,
                type: "GET",
                data: $formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: function($response) {
                    if ($response.status == true) {
                        $($response.html).hide().appendTo($target);
                        $($tab).modal("show");
                    }
                },
            });
        });
    </script>
@endpush
