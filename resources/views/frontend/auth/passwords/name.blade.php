@extends('backpack::auth')

@section('content')
    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="panel panel-info">
                <div class="panel-heading">{{ trans('labels.frontend.passwords.reset_password_box_title') }}</div>
                <div class="panel-body">
                    {{ Form::open(['route' => 'frontend.auth.password.name.post', 'class' => 'form-horizontal']) }}
                    <div class="form-group">
                        {{ Form::label('nickname', trans('validation.attributes.frontend.name'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::text('nickname', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.name'), 'autofocus']) }}
                            <div style="padding-top: .5em">
                                {{ laravel_link_to_route('frontend.auth.password.email', trans('labels.frontend.passwords.forgot_login_name')) }}
                            </div>
                        </div><!--col-md-6-->
                    </div><!--form-group-->
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit(trans('labels.frontend.passwords.send_password_reset_link_button'), ['class' => 'btn btn-primary']) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->
                    {{ Form::close() }}
                </div><!-- panel body -->
            </div><!-- panel -->
        </div><!-- col-md-6 -->
    </div><!-- row -->
@endsection
