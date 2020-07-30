@extends('admin.layouts.app_admin')

@section('content')
    @component('admin.Components.breadcrumbs')
        @slot('title') Создание записи @endslot
        @slot('parent') Главная @endslot
        @slot('active') Категории @endslot
        <form class="form-horizontal" action="{{route('admin.category.store')}}" method="post">
            {{csrf_field()}}

            @include('admin.categories.partials.form')


            <input type="submit" class="btn btn-primary form-control" value="Добавить">
        </form >


@endsection
