@extends('admin.layouts.master')
@section('title', 'Sliders')
@push('css')
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endpush
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Basic Form</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Forms</a>
            </li>
            <li class="active">
                <strong>Basic Form</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    <div class="ibox-tools">
            <a href="{{ route('sliders.create') }}" class="btn btn-sm btn-primary pull-right m-t-n-xs" 
            type="submit"><i class="fa fa-plus"></i> <strong>Create</strong></a>
        </div>
    </div>
</div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
           
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"> </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endpush

    