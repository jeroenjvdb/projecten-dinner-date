@if ($errors->has($err))
    {{-- col-xs-8 col-sm-8 col-md-12 col-lg-12--}}
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <span class="help-block">
            <p>{{ $errors->first($err) }}</p>
        </span>
    </div>
@endif