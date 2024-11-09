@extends('layouts.base')
@section('id')
    id="payment_fail"
@endsection
@section('content')
    <div class="about-container" style="padding-top:150px">

        <div class="row ">
            <div class="col-lg-12">
                <div class="d-flex about justify-content-center align-items-center">
                    <div class="col-lg-4 col-md-3">
                        <img src="{{ asset('assets/images/curveline.png') }}" alt="" id="frst-img">
                    </div>
                    <div class="col-lg-4">
                        <div class="about-text d-flex flex-column justify-content-center ">
                            <p class="about-title-p d-flex justify-content-center align-items-center">{{ __('common.payment') }}</p>
                            <div class="title-dash m-auto"></div>
                            <p class="about-paragraph" style="margin-bottom:300px">{!! __('common.payment_fail') !!}</p>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3">
                        <img src="{{ asset('assets/images/balerina.png') }}" alt="" id="scnd-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
