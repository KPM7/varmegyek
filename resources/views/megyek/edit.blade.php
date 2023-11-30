@extends('layouts.app')
{{-- resources/views/home.blade.php --}}
{{--{{ Breadcrumbs::render('login') }}--}}

@section('content')

<div class="kozep">

    <form method="post" action="{{ route('updateMegyek', $entity->id) }}" accept-charset="UTF-8" class="kozep">
        @csrf
        @method('patch')
        <div class="card-header">{{ __('Vármegyék módosítása') }} (#{{$entity->id}})</div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div>
                <div>
                    <label for="name"><strong>Név</strong></label>
                    <input type="text" name="name" value="{{ $entity->name }}" required>
                </div>
            </div>


        </div>

        <div class="kozep">
            <div class="col-auto">
                <button type="submit">
                    <i class="fa fa-save" title="Mentés"></i>&nbsp;{{__('Mentés')}}
                </button>
            </div>
            <div>
                <a class="btn" href="{{ route('varmegye') }}#{{$entity->id}}">
                    <i class="fa fa-ban" title="Mégse"></i>&nbsp;{{__('Mégse')}}</a>
            </div>
        </div>
    </form>
</div>

@endsection