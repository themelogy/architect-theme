@include('portfolio::admin.portfolios.partials.settings.text-field', [
    'fields'=>['describe'=>'text', 'employer'=>'text', 'tech_desc'=>'textarea'],
    'labels'=>['describe'=>'Tanım', 'employer'=>'İşveren', 'tech_desc'=>'Teknik Açıklama']
])

<div class="box-body">
    <div class="form-group{{ $errors->has("settings.group") ? ' has-error' : '' }}">
        {!! Form::label("settings.group", "Proje Grubu".':') !!}
        {!! Form::select('settings[group]', [''=>'Seçiniz']+trans('themes::portfolio.settings.groups'), !isset($portfolio->settings->group) ? null : $portfolio->settings->group, ['class'=>'form-control']) !!}
        {!! $errors->first("settings.group", '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group{{ $errors->has("settings.area_size") ? ' has-error' : '' }}">
        {!! Form::label("settings.area_size", "Alan".':') !!}
        {!! Form::input('text', 'settings[area_size]', !isset($portfolio->settings->area_size) ? '' : $portfolio->settings->area_size, ['class'=>'form-control']) !!}
        {!! $errors->first("settings.area_size", '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group{{ $errors->has("settings.location") ? ' has-error' : '' }}">
        {!! Form::label("settings.location", "Lokasyon".':') !!}
        {!! Form::input('text', 'settings[location]', !isset($portfolio->settings->location) ? '' : $portfolio->settings->location, ['class'=>'form-control']) !!}
        {!! $errors->first("settings.location", '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group{{ $errors->has("settings.partner") ? ' has-error' : '' }}">
        {!! Form::label("settings.partner", "Partner".':') !!}
        {!! Form::input('text', 'settings[partner]', !isset($portfolio->settings->partner) ? '' : $portfolio->settings->partner, ['class'=>'form-control']) !!}
        {!! $errors->first("settings.partner", '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group{{ $errors->has("settings.image_width") ? ' has-error' : '' }}">
        {!! Form::label("settings.image_width", "Resim Genişliği".':') !!}
        {!! Form::input('text', 'settings[image_width]', !isset($portfolio->settings->image_width) ? '' : $portfolio->settings->image_width, ['class'=>'form-control']) !!}
        {!! $errors->first("settings.image_width", '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group{{ $errors->has("settings.image_height") ? ' has-error' : '' }}">
        {!! Form::label("settings.image_height", "Resim Yüksekliği".':') !!}
        {!! Form::input('text', 'settings[image_height]', !isset($portfolio->settings->image_height) ? '' : $portfolio->settings->image_height, ['class'=>'form-control']) !!}
        {!! $errors->first("settings.image_height", '<span class="help-block">:message</span>') !!}
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