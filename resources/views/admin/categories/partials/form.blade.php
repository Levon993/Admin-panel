<label> Статус </label>
<select class="form-control">
    @if(isset($category->id))
        <option value="0" @if($category->published == 0) selected @endif> Не опубликованно</option>
        <option value="1" @if($category->published == 1) selected @endif> Опубликованно</option>
    @else
        <option value="0"> Не опубликованно</option>
        <option value="1"> Опубликованно</option>
        @endif
</select>
<br>
<label> Наименование Категории </label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="{{$category->title ?? ""}}"  required>

<label> Slug </label>
<input type="text"  class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$category->slug ?? ""}}"   readonly>

<label>Родительская Категория</label>
<select class="form-control">
    <option value="0">--Без родительской категории--</option>
   "@include('admin.categories.partials.categories',['categories' => $categories])

</select>


