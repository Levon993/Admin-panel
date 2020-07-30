@extends('admin.layouts.app_admin')
@section('content')
    <div class="container">
        @component('admin.Components.breadcrumbs')
                @slot('title') Список Категорий @endslot
                @slot('parent') Главная @endslot
                @slot('active') Категории @endslot
    </div>
    @endsection
 <hr>

<a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right">
    <i class="fa fa-plus-square-o">Создание Категорий</i>
</a>
<table class="table table-striped">
    <thead>
    <th>Наименования</th>
    <th>Публикация</th>
    <th class="text text-right">Действие</th>
    </thead>
    <tbody>
    @forelse($categories as $category)
        <tr>
            <td>{{$category->title}}</td>
            <td>{{$category->published}}</td>
            <td>
            <form onsubmit="if(confirm('Удалить')){return true}else{return false}"
                  action="{{route('admin.category.destroy', $category->id)}} " method="post">
                <input type="hidden" name="_method" value="DELETE">
                {{csrf_field()}}
                <a  href="{{route('admin.category.edit', $category)}}"><i class="fa fa-edit"></i></a>
                <button type="submit" class="btn">
                    <i  class="fa fa-trash-o"></i>
                </button>
            </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center"><h2>Данные отсуствуют</h2></td>
        </tr>
        @endforelse

    </tbody>
    <tfoot>
     <te>
         <td colspan="3">
             <ul class="pagination pull-right">
             {{$categories->links()}}
             </ul>
         </td>
     </te>
    </tfoot>
</table>
