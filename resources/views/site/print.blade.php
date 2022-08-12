@extends('layouts.app')

@section('title',trans('site.print'))	

@section('style')
<link rel="stylesheet" href="{{ asset('site/css/product_info.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/check-out.css') }}">
<link rel="stylesheet" href="{{ asset('site/css/print.css') }}">
<style>
        /* HIDE RADIO */
        [type=radio] { 
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
        }

        /* IMAGE STYLES */
        [type=radio] + img {
        cursor: pointer;
        }

        /* CHECKED STYLES */
        

    </style>
@stop
@section('content')
<!--start print-->
<section class="print">
    <div class="container">
        <div class="title">
           <div class="title-img"></div>
        </div>
        @include('layouts.alert')

        <!--start bread crumb-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}"><div class="img"></div></a></li>
                <li class="breadcrumb-item active arrest-bread" aria-current="page">Print</li>
            </ol>
        </nav>
        <!--end bread crumb-->
        <!-- start sign up as tutor    -->
        <section class="sign-up-as-tutor">
            <div class="sign-up">
                <div class="container">
                    <!-- multistep form -->
                    
                    {!! Form::open(['url'=>'/print/create-order','id'=>"msform",'files'=>true,'style'=>"min-height: 720px;"]) !!}
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active">Info</li>
                            <li>Style</li>
                            <li>Design</li>
                        </ul>
                        <!-- fieldsets -->
                        <fieldset>
                            <h2 class="fs-title">Client Info</h2>
                            <h3 class="fs-subtitle">Basic Information</h3>
                            <input type="text" name="name" placeholder="Full name" />
                            <input type="text" name="phone" placeholder="Phone" />
                            <input type="email" name="email" placeholder="Email" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title">Choose Style</h2>
                            <h3 class="fs-subtitle">pick one from these styles</h3>
                            <div class="choose-style">
                                <div class="row">
                                    @foreach (\App\Model\Admin\PrintImage::all() as $image)
                                        
                                    <div class="col-md-4">
                                        <div class="style-card" >
                                            <label style="width: 100%; height: 100%; cursor: pointer" >
                                                <input type="radio" name="style_image_id" value="{{ $image->id }}" checked>
                                                <img src="{{ $image->image }}">
                                                <h5 class="title">{{ $image->title }}</h5>
                                            </label>
                                            {{--  <img src="{{ $image->image }}" class="img-fluid" alt="style1">  --}}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                {{-- <div class="row">
                                    <div class="col-md-4">
                                        <div class="style-card">
                                            <img src="{{  asset('site/image/print/t4.png')}}" class="img-fluid" alt="style1">
                                            <h5 class="title">T-shirt</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="style-card">
                                            <img src="{{  asset('site/image/print/t5.png')}}" class="img-fluid" alt="style2">
                                            <h5 class="title">T-shirt</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="style-card">
                                            <img src="{{  asset('site/image/print/t6.png')}}" class="img-fluid" alt="style3">
                                            <h5 class="title">T-shirt</h5>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <h2 class="fs-title">Design</h2>
                            <h3 class="fs-subtitle">Select details of the design</h3>
                            <div class="design-details">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="title">Quantity</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="select-number">
                                            <span class="mins"><i class="fas fa-minus"></i></span>
                                            <span class="number"><input style="margin: 0;border-bottom: 0;border-top: 0;border-radius: 0" type="text" name="qty" class="form-control" id="usr" value="1"></span>
                                            <span class="plus"><i class="fas fa-plus"></i></span>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="title">Color</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="s-color">
                                            <input type="color" name="color" style="padding: 0px">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="title">Description</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <textarea class="form-control" style="width: 80%" rows="4" id="comment" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="title">Uploud Design</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" name="design">
                                    </div>
                                </div>
                            </div>
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                            <input type="submit" name="submit" class="submit action-button" value="Submit" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>

        <!--end sign up as tutor  -->

    </div>
</section>
<!--end print-->
@stop
@section('script')
    <script src="{{ asset('site/js/mdb.min.js') }}"></script>
    <script src="{{ asset('site/js/print.js') }}"></script>
@stop

