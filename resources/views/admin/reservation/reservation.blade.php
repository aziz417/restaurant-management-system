@extends('admin.layouts.master')
@section('title', 'Reservations')
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
                <th>Phone</th>
                <th>Email</th>
                <th>Date And Time</th>
                <th>Message</th>
                <th>Status</th>
                <th class="actionCenter">Action</th>
            </tr>
        </thead>
        <tbody>
      
            @foreach($reservations as $reservation)
                <tr>
                    <td><?php echo $reservation->name ?></td>
                    <td><?php echo $reservation->phone ?></td>
                    <td><?php echo $reservation->email ?></td>
                    <td><?php echo $reservation->date_and_time ?></td>
                    <td><?php echo $reservation->message ?></td>
                    <td> 

                        @if($reservation->status == null)
                            <form id="status-form-{{$reservation->id}}" action="{{ route('reservation.status', $reservation->id) }}" 
                                method="POST">
                                @csrf 
                            </form>
                        
                            <button type="button" 
                                onclick="if( confirm('are you sure verify this request by phone?')){
                                event.preventDefault();
                                document.getElementById('status-form-{{ $reservation->id }}').submit();
                                }else{
                                    event.preventDefault();
                                }" 
                            class="color-info">Unsuccess</button>
                        @else
                        <button class="color-success">Success</button>
                        @endif

                    </td>
                    <td class="actionCenter">
                    <form id="delete-form-{{ $reservation->id }}" action="{{ route('reservation.destroy', $reservation->id) }}" method="post">
                            @csrf
                            @method('delete')
                    </form>
                    <button type="submit" class="cus_mini_icon color-danger"
                    onclick="if( confirm('Are you sure delete this reservation?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $reservation->id }}').submit();
                    }else{
                        event.preventDefault();
                    }"
                    ><i class="fa fa-trash "></i></button>
                    </td>
                </tr>
                
            @endforeach

        </tbody>
        <tfoot>
        <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Date And Time</th>
                <th>Message</th>
                <th>Status</th>
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

    