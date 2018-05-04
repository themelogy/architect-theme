<div>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.personal') }}</legend>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>{{ trans('hr::applications.form.first_name') }}</th>
                        <td>{{ $application->first_name }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('hr::applications.form.last_name') }}</th>
                        <td>{{ $application->last_name }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.contact') }}</legend>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="col-md-2">{{ trans('hr::applications.form.contacts.address1') }}</th>
                <td>{{ $application->present()->contact('address') }}</td>
            </tr>
            <tr>
                <th class="col-md-2">{{ trans('hr::applications.form.contacts.phone') }}</th>
                <td>{{ $application->present()->contact('phone') }}</td>
            </tr>
            <tr>
                <th class="col-md-2">{{ trans('hr::applications.form.contacts.gsm') }}</th>
                <td>{{ $application->present()->contact('gsm') }}</td>
            </tr>
            <tr>
                <th class="col-md-2">{{ trans('hr::applications.form.contacts.email') }}</th>
                <td>{{ $application->present()->contact('email') }}</td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>{{ trans('hr::applications.legend.language') }}</legend>
        <table class="table table-striped table-bordered">
            <tr>
                <th class="col-md-3">{{ trans('hr::applications.form.language') }}</th>
                <th class="col-md-3">{{ trans('hr::applications.form.languages.read') }}</th>
                <th class="col-md-3">{{ trans('hr::applications.form.languages.write') }}</th>
                <th class="col-md-3">{{ trans('hr::applications.form.languages.speak') }}</th>
            </tr>
            @if(count($application->present()->language)>0)
                @foreach($application->present()->language as $language)
                    <tr>
                        <td>{{ $language->lang }}</td>
                        <td>{{ $language->read }}</td>
                        <td>{{ $language->write }}</td>
                        <td>{{ $language->speak }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </fieldset>
</div>
<style>
    td, th {
        text-align: left;
    }
</style>