@extends('layouts.app')
{{-- resources/views/home.blade.php --}}
{{--{{ Breadcrumbs::render('login') }}--}}

@section('content')


<div class="kozep">

    <strong>{{ __('Vármegyék') }}</strong><br>
    <form method="post" action="{{route('searchMegyekk')}}" accept-charset="UTF-8">
        @csrf
        <input type="text" name="needle" placeholder="Keresés">

        <button class="btn" type="submit">
            <i class="fa fa-search" title="Keresés"></i>
        </button>
    </form>

    <div>
        @if (session('status'))
        <div role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div>
            <form>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Megnevezés</th>
                            <th>Művelet&nbsp;
                                <a href="{{route('createMegyek')}}">
                                    <i class="fa fa-plus" title={{ __("ÚJ") }}></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($entities as $entity)
                        <tr>
                            <td id="{{ $entity->id }}">{{$entity->id}}</td>
                            <td>{{$entity->name}}</td>
                            <td style="display: flex">

                                <form method="post" action="{{ route('editMegyek', $entity->id) }}">
                                    <button type="submit">
                                        <i class="fa fa-edit" title="Módosítás"></i>
                                    </button>
                                    @csrf
                                </form>
                                <form method="post" action="{{ route('deleteMegyek', $entity->id) }}">
                                    <button type="submit">
                                        <i class="fa fa-trash" title="Törlés"></i>
                                    </button>
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection