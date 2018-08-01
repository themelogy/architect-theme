@include('portfolio::admin.portfolios.partials.settings.text-field', [
    'fields'=>['describe'=>'text', 'employer'=>'text', 'tech_desc'=>'textarea'],
    'labels'=>['describe'=>'Tanım', 'employer'=>'İşveren', 'tech_desc'=>'Teknik Açıklama']
])

<div class="box-body">
    <div class="row">
        @foreach(trans('themes::portfolio.settings.groups') as $key => $group)
        <div class="col-md-3">
            <div class="form-group" style="margin-right: 10px;">
                <label>
                    {!! Form::checkbox("settings[groups][]", $key, old('settings.groups.'.$key, in_array($key, $portfolio->settings->groups ?? [])), ['class'=>'flat-blue']) !!}
                    {{ $group }}
                </label>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group{{ $errors->has("settings.area_size") ? ' has-error' : '' }}">
                {!! Form::label("settings.area_size", "Alan".':') !!}
                {!! Form::input('text', 'settings[area_size]', !isset($portfolio->settings->area_size) ? '' : $portfolio->settings->area_size, ['class'=>'form-control']) !!}
                {!! $errors->first("settings.area_size", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group{{ $errors->has("settings.location") ? ' has-error' : '' }}">
                {!! Form::label("settings.location", "Lokasyon".':') !!}
                {!! Form::input('text', 'settings[location]', !isset($portfolio->settings->location) ? '' : $portfolio->settings->location, ['class'=>'form-control']) !!}
                {!! $errors->first("settings.location", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group{{ $errors->has("settings.partner") ? ' has-error' : '' }}">
                {!! Form::label("settings.partner", "Partner".':') !!}
                {!! Form::input('text', 'settings[partner]', !isset($portfolio->settings->partner) ? '' : $portfolio->settings->partner, ['class'=>'form-control']) !!}
                {!! $errors->first("settings.partner", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has("settings.video") ? ' has-error' : '' }}">
        {!! Form::label("settings.video", "Video".':') !!}
        {!! Form::input('text', 'settings[video]', !isset($portfolio->settings->video) ? '' : $portfolio->settings->video, ['class'=>'form-control']) !!}
        {!! $errors->first("settings.video", '<span class="help-block">:message</span>') !!}
    </div>
</div>

@push('js-stack')
<script>
    $( document ).ready(function() {
        $(".textarea").wysihtml5();
    });
</script>
@endpush