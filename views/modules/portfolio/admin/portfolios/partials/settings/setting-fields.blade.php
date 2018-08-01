<div class="box-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group{{ $errors->has("settings.group_image") ? ' has-error' : '' }}">
                {!! Form::label("settings.group_image", "Grup Resmi".':') !!}
                {!! Form::select("settings[group_image]", ['Seçiniz']+trans('themes::portfolio.settings.groups'), !isset($portfolio->settings->group_image) ? '' : $portfolio->settings->group_image, ['class'=>'form-control']) !!}
                {!! $errors->first("settings.group_image", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group{{ $errors->has("settings.image_width") ? ' has-error' : '' }}">
                {!! Form::label("settings.image_width", "Resim Genişliği".':') !!}
                {!! Form::input('text', 'settings[image_width]', !isset($portfolio->settings->image_width) ? '' : $portfolio->settings->image_width, ['class'=>'form-control']) !!}
                {!! $errors->first("settings.image_width", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group{{ $errors->has("settings.image_height") ? ' has-error' : '' }}">
                {!! Form::label("settings.image_height", "Resim Yüksekliği".':') !!}
                {!! Form::input('text', 'settings[image_height]', !isset($portfolio->settings->image_height) ? '' : $portfolio->settings->image_height, ['class'=>'form-control']) !!}
                {!! $errors->first("settings.image_height", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
    </div>
</div>