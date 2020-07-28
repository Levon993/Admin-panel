<label for="">Статус</label>
<select class="form-control" name="published">
@if(isset($category->id))
        <option class="form-control" value="0" @if($category->published == 0) selected @endif>Не опубликовна </option>

        <option class="form-control" value="1" @if($category->published == 1) selected @endif> Опубликовна </option>
    @else
        <option class="form-control" value="0">Не опубликовна </option>
        <option class="form-control" value="1">Не опубликовна </option>

    @endif

</select>

<label for="">Наименования</label>
<input type="text" class="form-control" placeholder="Заголовок категории" value="{{$category->title ?? ""}}">

<label for="">Slug</label>
<input type="text" class="form-control default"  placeholder="Генерируется Автоматически" value="{{$category->slug ?? ""}}">

<label>Родителькая категорич</label>
<select class="form-control">
    <option value="0">--Нет родительско категории--</option>
    @include('admin.categories.partials.categories')

</select>
<hr>

<input type="submit" class="btn btn-success" value="Отправить">
