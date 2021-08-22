@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('post.store') }}" method="POST">
    @csrf
    <input type="text" name="title" value="">
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <select name="category_id" id="">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    </br>
    <textarea name="content" cols="30" rows="10"></textarea>
    <br>
    <button>Luu lai</button>
</form>