<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl" lang="ar">
    <head>
        {{app()->setLocale('ar')}}
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        <title>{{ trans('app.print') }}
        
        </title>
        <link rel='stylesheet' type='text/css' href="{{ asset('css/style.css') }}" />
        <link rel='stylesheet' type='text/css' href="{{ asset('css/print.css') }}" media="print" />
        {{-- <script type='text/javascript' src='{{ asset('js/jquery-1.3.2.min.js') }}'></script> --}}
        {{-- <script type='text/javascript' src='{{ asset('js/example.js') }}'></script> --}}
        <style>
            @import url('https://fonts.googleapis.com/css?family=Cairo');
        </style>
        <style type="text/css">
            body, *{
            font-family: 'Cairo', sans-serif !important;
            -webkit-print-color-adjust: exact;
            }
        </style>
    </head>
    <body>
        <div id="page-wrap">
            <div id="identity">
                <div >
                     {!! Html::image(settings()->site_logo,'',['id'=>'image','alt'=>'logo' ,'style'=>'background-image: url("/site/image/Rectangle%204.jpg");'])!!}   
                </div>
            </div>
            <div style="clear:both"></div>
            <table id="items" style="margin-top:  10px;">
                <thead>                    
                    <tr>
                        
                        <th>رقم الطلب  </th>
                        <th>اسم المشتري</th>
                        @if (!Request::is('admin/all-orders/print'))
                        <th>البريد الإلكتروني </th>
                        <th> رقم الهاتف </th>
                        <th>  العنوان </th>
                        @endif
                        <th>الكمية</th>
                        <th>الحاله</th>
                        <th>السعر</th>
                        <th>سعر الشحن</th>
                        <th>خصم </th>
                        <th>الإجمالي</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @if (Request::is('admin/all-orders/print'))
                        
                    @foreach ($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->f_name }} {{ $order->s_name }}</td>
                        <td>{{ $order->count }} قطعه</td>
                        <td>{{ trans('app.'.$order->status) }} </td>
                        <td>{{ $order->subtotal }} جنيه</td>
                        <td>{{ $order->shipping }} جنيه</td>
                        <td>{{ $order->discount?$order->discount:'0' }} جنيه</td>
                        <td>{{ $order->total }} جنيه</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->f_name }} {{ $order->s_name }}</td>
                        <td>{{ $order->email }} </td>
                        <td>{{ $order->phone }} </td>
                        <td>{{ $order->address }} </td>
                        <td>{{ $order->count }} قطعه</td>
                        <td>{{ trans('app.'.$order->status) }} </td>
                        <td>{{ $order->subtotal }} جنيه</td>
                        <td>{{ $order->shipping }} جنيه</td>
                        <td>{{ $order->discount?$order->discount:'0' }} جنيه</td>
                        <td>{{ $order->total }} جنيه</td>
                    </tr>
                    @endif
                    
                </tbody>
            </table>
            @if (!Request::is('admin/all-orders/print'))
            <table id="items" style="margin-top:  10px;">
                <caption style="text-align: center">تفاصيل الطلب</caption>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>المنتج</th>
                        <th>الكميه</th>
                        <th>الحجم</th>
                        <th>سعر القطعه</th>
                        <th>السعر الكلي</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1 ?>
                    @foreach($order->orderItems as $item)
                    <tr>
                        <td> {{ $i++}} </td>
                        <td> {{ $item->name_ar }} </td>
                        <td> {{ $item->pivot->qty }} </td>
                        <td> {{ $item->pivot->size }}</td>
                        <td> {{ $item->price}} جنيه</td>
                        <td> {{ $item->price*$item->pivot->qty }} جنيه</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
           <div style="width: 100% ;position: relative;margin-top: 20px" >
                <button class="btn btn-primary delete" style="position: absolute;"  onclick="window.print()">طباعة</button>
            </div>
        </body>
    </div>
</html>