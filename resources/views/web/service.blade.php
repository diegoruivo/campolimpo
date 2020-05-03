@extends('web.master.master')

@section('content')

    <div class="content-lg container">
        <div class="row justify-content-md-center">

        <div class="row margin-b-40" style="padding:40px;">

            <div class="container">

            <div class="col-md-9" style="margin:0 auto; float:none;">

                <span class="text-uppercase">{{ $service->service_category()->first()->title }}</span>
                <h1>{{ $service->title }}</h1>
                <h2>{{ $service->subtitle }}</h2>
                <p>{!! $service->description !!}</p>


            </div>

            </div>
        </div>
    </div>

@endsection