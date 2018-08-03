@extends('.default')
@section('content')
    <div class="container">
        <form action="{{ route('Rbac.update',['shop'=>$edit]) }}" method="post" enctype="multipart/form-data">
            权限名称: <input type="text" name="name" value="@if(old('name')){{ old('name') }}@else{{ $edit->name }}@endif"><br>
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <button type="submit">提交</button>
        </form>
    </div>
@endsection
