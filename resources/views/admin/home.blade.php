@extends('admin.layout.app')
@section('title','لوحة التحكم')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">لوحة التحكم</div>

        <div class="panel-body">
            مرحبا بك {{ auth()->user()->name }}
        </div>
    </div>
    <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup">{{ count(App\Model\Site\Order::where('status','=','delivered')->where('created_at','>=', (Carbon\Carbon::now())->subDay(7)->format('Y-m-d') )->where('created_at','<=', (Carbon\Carbon::now())->format('Y-m-d'))->get() ) }}</span>
                        </div>
                        <div class="desc"> {{ trans('مبيعات اخر 7 ايام') }}  </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 purple-plum" href="#">
                    <div class="visual">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup">{{ count(App\Model\Site\Order::where('status','=','delivered')->where('created_at','>=', (Carbon\Carbon::now())->subDay(30)->format('Y-m-d') )->where('created_at','<=', (Carbon\Carbon::now())->format('Y-m-d'))->get() ) }}</span>
                        </div>
                        <div class="desc"> {{ trans('مبيعات اخر شهر') }}  </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 grey" href="#">
                    <div class="visual">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup">{{ count(App\Model\Site\Order::where('status','=','delivered')->where('created_at','>=', (Carbon\Carbon::now())->subDay(90)->format('Y-m-d') )->where('created_at','<=', (Carbon\Carbon::now())->format('Y-m-d'))->get() ) }}</span>
                        </div>
                        <div class="desc"> {{ trans('مبيعات اخر 3 شهور') }}  </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                    <div class="visual">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup">{{ count(App\Model\Site\Order::where('status','=','delivered')->where('created_at','>=', (Carbon\Carbon::now())->subDay(360)->format('Y-m-d') )->where('created_at','<=', (Carbon\Carbon::now())->format('Y-m-d'))->get() ) }}</span>
                        </div>
                        <div class="desc"> {{ trans('مبيعات اخر سنة') }}  </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                    <div class="visual">
                        <i class="fa fa fa-h-square"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup">{{ App\User::count() }}</span> 
                        </div>
                        <div class="desc"> الأعضاء</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa fa-h-square"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup">{{ App\Model\Admin\Product::count() }}</span> 
                        </div>
                        <div class="desc"> المنتجات</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                    <div class="visual">
                        <i class="fa fa fa-h-square"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup">{{ App\Model\Site\PrintDesign::count() }}</span> 
                        </div>
                        <div class="desc"> طلبات الطباعة</div>
                    </div>
                </a>
            </div>
    </div>
@endsection
