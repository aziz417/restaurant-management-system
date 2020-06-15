@extends('admin.layouts.master')
@section('title', 'Sliders')
@push('css')

@endpush
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('sliders.index') }}">Slider</a>
                </li>
                <li class="active">
                    <strong>Edit</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5>Edit Slider</h5>
                    </div>

                    <div class="ibox-content">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('sliders.update', $slider->id) }}">
                           @csrf
                           @method('PUT')

                           @include('admin.slider.element')

                            <div class="form-group">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                    <button class="btn btn-primary pull-left" type="submit">
                                        <strong>Update</strong>
                                     </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
  
@endpush

    