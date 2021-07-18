<form action="{{ route('post.store') }}" method="POST">
    @csrf
    <input type="text" name="title" value="">
    <br>
    <textarea name="content" cols="30" rows="10"></textarea>
    <br>
    <button>Luu lai</button>
</form>