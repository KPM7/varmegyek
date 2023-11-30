@extends('layouts.app')

@section('content')

<div class="kozep">

<form method="post" action="{{ route('saveMegyek') }}" accept-charset="UTF-8" class="kozep">
    @csrf
    <div>{{ __('Új vármegye') }}</div>
    @if (session('status'))
    <div role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div>
        <div>
            <label for="name"><strong>Név</strong></label>
            <input type="text" name="name" required>
        </div>
    </div>

    </div>
    <div class="kozep">
        <div>
            <button type="submit" class="btn"><i class="fa fa-save" title="Mentés"></i>&nbsp;{{__('Mentés')}}</button>
        </div>
        <div>
            <a href="{{ route('varmegye') }}"><i class="fa fa-ban" title="Mégse"></i>&nbsp;{{__('Mégse')}}</a>
        </div>
    </div>
</form>
</div>

@endsection