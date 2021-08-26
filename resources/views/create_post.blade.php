<h2>{{ trans('post.create') }}</h2>

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
    <input type="text" name="title" value="{{old('title')}}" />
    @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <select name="category_id" id="">
        @foreach($categories as $category)
        <option value="{{$category->id}}" 
            @if( old('category_id') == $category->id ) selected @endif
            >{{$category->name}}</option>
        @endforeach
    </select>
    </br>
    <textarea name="content" cols="30" rows="10">{{old('content')}}</textarea>
    <br>
    <button>Luu lai</button>
</form>