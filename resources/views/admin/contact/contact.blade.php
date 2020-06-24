@extends('admin.layouts.master')
@section('title', 'Contacts')
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
   
</div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Created At</th>
                <th class="actionCenter">Action</th>
            </tr>
        </thead>
        <tbody>
      
            @foreach($contacts as $contact)
                <tr>
                    <td><?php echo $contact->name ?></td>
                    <td><?php echo $contact->email ?></td>
                    <td><?php echo $contact->subject ?></td>
                    <td><?php echo $contact->message ?></td>
                    <td><?php echo $contact->created_at ?></td>
                    <td class="actionCenter">
                        <form action="{{ route('contact.destroy',$contact->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="cus_mini_icon color-danger"><i class="fa fa-trash "></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
            <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Created At</th>

                <th class="actionCenter">Action</th>
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

    