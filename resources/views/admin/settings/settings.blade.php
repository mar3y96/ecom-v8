@extends('admin.layout.app') @section('title','اعدادات الموقع') @section('content')
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ url('admin/home') }}">احصائيات</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{ url('admin/settings') }}">اعدادات الموقع</a>
                </li>
            </ul>
            
        </div>
        <div class="tab-pane active" id="tab_6">
        @include('layouts.alert')
        <div class="portlet box blue ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> تعديل الإعدادات 
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title="">
                    </a>
                    <a href="javascript:;" class="remove" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                {!! Form::open(['route'=>['admin.settings.update'],'method'=>'PUT','files'=>true]) !!}
                <div class="form-body form-horizontal form-bordered form-row-stripped">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">اسم الموقع</label>
                                {!! Form::text('siteTitle',settings()->siteTitle,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">رابط الموقع</label>
                                {!! Form::text('site_url',settings()->site_url,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> العنوان بالعربية</label>
                                {!! Form::text('address_ar',settings()->address_ar,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> العنوان بالإنجليزية</label>
                                {!! Form::text('address',settings()->address_en,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">البريد الالكتروني</label>
                                {!! Form::text('site_email',settings()->site_email,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">رابط الفيس بوك</label>
                                {!! Form::text('facebook',settings()->facebook,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">رابط الانستجرام</label>
                                {!! Form::text('instagram',settings()->instagram,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">رابط تويتر</label>
                                {!! Form::text('twitter',settings()->twitter,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">رقم الهاتف 1</label>
                                {!! Form::text('phone',settings()->phone,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">رقم الهاتف 2</label>
                                {!! Form::text('phone2',settings()->phone2,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">  لوجو الموقع</label>
                                {!! Form::file('site_logo',['class'=>'form-control','rows'=>'5']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2"> لوجو الموقع</label>
                            <div class="col-md-4">
                                {!! Html::image(settings()->site_logo,'',['width'=>'100px','height'=>'100px'])!!}
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label">وصف الموقع</label>
                                {!! Form::textarea('description',settings()->description,['class'=>'form-control','rows'=>'5']) !!}
                            </div>
                        </div>
                    </div>

                    <div style="background-color: #ddd; text-align: center">عن الموقع</div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">نبذة عن الموقع بالعربية</label>
                                {!! Form::textarea('about_ar',settings()->about_ar,['class'=>'form-control','rows'=>'5']) !!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">نبذة عن الموقع بالإنجليزية</label>
                                {!! Form::textarea('about_en',settings()->about_en,['class'=>'form-control','rows'=>'5']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> صوره عن الموقع</label>
                                {!! Form::file('about_section1_image',['class'=>'form-control','rows'=>'5']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">  صوره عن الموقع</label>
                            <div class="col-md-4">
                                {!! Html::image(settings()->about_section1_image,'',['width'=>'100px','height'=>'100px'])!!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> رؤيتنا بالعربية</label>
                                {!! Form::textarea('vision_ar',settings()->vision_ar,['class'=>'form-control','rows'=>'5']) !!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">رؤيتنا بالإنجليزية</label>
                                {!! Form::textarea('vision_en',settings()->vision_en,['class'=>'form-control','rows'=>'5']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> أهدافنا بالعربية</label>
                                {!! Form::textarea('goals_ar',settings()->goals_ar,['class'=>'form-control','rows'=>'5']) !!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">أهدافنا بالإنجليزية</label>
                                {!! Form::textarea('goals_en',settings()->goals_en,['class'=>'form-control','rows'=>'5']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> رسالتنا بالعربية</label>
                                {!! Form::textarea('mission_ar',settings()->mission_ar,['class'=>'form-control','rows'=>'5']) !!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">رسالتنا بالإنجليزية</label>
                                {!! Form::textarea('mission_en',settings()->mission_en,['class'=>'form-control','rows'=>'5']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> صوره عن الموقع الثانيه</label>
                                {!! Form::file('about_section2_image',['class'=>'form-control','rows'=>'5']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2"> صوره عن الموقع الثانيه</label>
                            <div class="col-md-4">
                                {!! Html::image(settings()->about_section2_image,'',['width'=>'100px','height'=>'100px'])!!}
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-circle blue"><i class="fa fa-check"></i>تعديل</button>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                </div>
                <!-- END FORM-->
            </div>
        </div>
    </div>
@stop