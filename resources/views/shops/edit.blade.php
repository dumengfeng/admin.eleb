@extends('.default')
@section('content')
    <div class="container">
        <form action="{{ route('shops.update',['shop'=>$edit]) }}" method="post" enctype="multipart/form-data">
            分类名称: <input type="text" name="name" value="@if(old('name')){{ old('name') }}@else{{ $edit->name }}@endif"><br>
            LOGO:<input type="file" name="img"><br>
            <img src="{{ $edit->img() }}" alt=""><br>
            是否显示: 显示<input type="radio" {{ $edit->status==1?'checked':'' }} name="status" value="1">
            隐藏<input type="radio" name="status" {{ $edit->status==0?'checked':'' }} value="0"><br>
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <button type="submit">提交</button>
        </form>
    </div>
@endsection
