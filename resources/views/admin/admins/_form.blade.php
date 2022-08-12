<div class="form-body form-horizontal form-bordered form-row-stripped">
    <div class="form-group">
        <label class="control-label col-md-2">{{ trans('app.name') }}</label>
        <div class="col-md-9">
            {!! Form::text('name',null,['class'=>'form-control input-circle']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-2">{{ trans('app.email') }} </label>
        <div class="col-md-9">
            {!! Form::text('email',null,['class'=>'form-control input-circle']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-2">{{ trans('app.password') }} </label>
        <div class="col-md-9">
            {!! Form::password('password',['class'=>'form-control input-circle']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-2">صلاحيات المدير</label>
        <div class="col-md-9">
            @if($process == 'create')
            <table class="table table-hover">
                <tr>
                    <td>
                        قسم المديرين
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="pre" value="1">
                    </td>
                </tr>
            </table>
            @else
                <table class="table table-hover">
                    <tr>
                        <td>
                            قسم المديرين
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="pre" value="1" @if($admin->pre == '1') {{ 'checked' }} @endif>
                        </td>
                    </tr>
                </table>
                @endif
        </div>
    </div>

    @if(isset($btn))
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn btn-circle blue"><i class="fa fa-check"></i> {{ $btn }} </button>
            </div>
        </div>
    </div>
    @endif
</div>