@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Time Zones') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
@php
 $timeZone = Config::get('timezone.timezones');
 $selectedTime = Route::input('timezone');
@endphp
                    <div class="form-group row">
                        <label for="timezone" class="col-md-2 col-form-label text-md-left"><b>TimeZone</b></label>
                        <div class = "col-md-6"> <select name="timezone" class="form-control" onchange="changeTimeZone(this.value)">
                            <option value="">All</option>
                            @foreach($timeZone as $time => $value)
                            <option value"{{$time}}" {{$currentTimeZone == $time ? 'selected' : ''}}>{{$time}}</options>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row"><br></div>
                    <div class="form-group row">
                        <label for="selected_timezone" class="col-md-2 col-form-label text-md-left"><b>Time with TimeZone</b></label>
                        <div class = "col-md-6"> {{$todayTime}} - {{$currentTimeZone}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">
    function changeTimeZone(str){
        var timezone = str;
        var newtimezone = timezone.replace("/", "_");
        var url="{{URL::to('/')}}";
        if(timezone==''){
            var timezone = 'null';
            var newtimezone = 'null';
        }
        window.location.href=url+"/time"+"/"+newtimezone;
    }
</script>
