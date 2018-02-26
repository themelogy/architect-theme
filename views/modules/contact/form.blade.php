<h3 class="title no-margin m-bot-20">{{ trans('themes::contact.write us') }}</h3>
<p>{{ trans('themes::contact.write us desc') }}</p>
{!! Form::open(['route' => 'contact.send', 'class' => 'contact', 'method'=>'post']) !!}
{!! Form::hidden('from', Request::path()) !!}
<div class="row">
    <div class="col-md-6">
        <div class="input-field">
            {!! Form::text('first_name', old('first_name'), ['placeholder'=>trans('contact::contacts.form.first_name')]) !!}
            {!! $errors->first("first_name", '<span class="help-block red-text">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-field">
            {!! Form::text('last_name', old('last_name'), ['placeholder'=>trans('contact::contacts.form.last_name')]) !!}
            {!! $errors->first("last_name", '<span class="help-block red-text">:message</span>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="input-field">
            {!! Form::text('phone', old('phone'), ['placeholder'=>trans('contact::contacts.form.phone')]) !!}
            {!! $errors->first("phone", '<span class="help-block red-text">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-field">
            {!! Form::text('email', old('email'), ['placeholder'=>trans('contact::contacts.form.email')]) !!}
            {!! $errors->first("email", '<span class="help-block red-text">:message</span>') !!}
        </div>
    </div>
</div>
<div class="input-field">
    {!! Form::textarea('enquiry', old('enquiry'), ['class'=>'materialize-textarea', 'placeholder'=>trans('contact::contacts.form.enquiry')]) !!}
    {!! $errors->first("enquiry", '<span class="help-block red-text">:message</span>') !!}
</div>
<div class="row">
    <div class="col-md-6">
        <button type="submit" name="submit" class="btn submit-button text-uppercase">{{ trans('contact::contacts.form.submit') }}</button>
    </div>
    <div class="col-md-6">
        <div class="form-group pull-right @if ($errors->has('g-recaptcha-response')) has-error @endif">
            {!! Captcha::display() !!}
            <span class="help-block red-text"><small>{!! $errors->first('g-recaptcha-response') !!}</small></span>
        </div>
    </div>
</div>
{!! Form::close() !!}

@push('js-inline')
{!! Captcha::script() !!}
@endpush