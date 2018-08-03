@extends('.default')
@section('content')
    <div class="container">
        <form action="{{ route('Role.update',['shop'=>$edit]) }}" method="post" enctype="multipart/form-data">
            权限名称: <input type="text" name="name"
                         value="@if(old('name')){{ old('name') }}@else{{ $edit->name }}@endif"><br>
            <div class="form-group">
                <label for="exampleInputEmail1">角色权限:</label>
                @foreach($permission as $val)
                    <label class="checkbox-inline">
                        <input type="checkbox"
                               @if($edit->hasPermissionTo($val->name))
                               checked
                               @endif
                               name="permission[]" value="{{ $val->id }}"> {{$val->name}}
                    </label>
                @endforeach
            </div>
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <button type="submit">提交</button>
        </form>
    </div>
@endsection
