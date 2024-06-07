@extends('layouts.main')

@section('title', $title)

@section('content')
    <div class="container-fluid mt-5">
        <div class="col-12">
            <div class="alert alert-success d-none fw-bold" id="successMsg" role="alert"></div>
        </div>
        <div class="card">
            <div class="card-header bg-white">
                <h3 class="fw-semibold">Task Management
                    <button id="addTask" type="button" class="btn btn-success fw-semibold float-end">Add Task</button>
                    <button type="button" id="massDeleteBtn" class="btn btn-danger d-none fw-semibold float-end me-2">Delete Tasks</button>
                    <form action="{{ route('task.export') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary fw-semibold float-end me-2">Export</button>
                    </form>

                    <form id="importForm" action="{{ route('task.import') }}" method="POST" class="d-inline" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="d-none" name="file" id="file" />
                        <button type="button" id="importBtn" class="btn btn-warning float-end me-2 fw-semibold">Import</button>
                    </form>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="taskTable">
                    <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Assignee</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @include('modals.task')

@endsection

@section('pre_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endsection

@section('pre_js')
    <script src="{{ asset('custom/js/task.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
@endsection
