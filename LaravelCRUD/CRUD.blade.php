@extends('tableLayout')

@section('content')
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
    </div>
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h3>CRUD</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('data.create')}}"> Create New Data </a>
            </div>
        </div>
    </div>

    <table style="width:50%">
        <tr>
            <th>id</th>
            <th>data1</th>
            <th>data2</th>
            <th>Action</th>
        </tr>
        @foreach($datas as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->data1}}</td>
                <td>{{$data->data2}}</td>
                <td>
                    <form action="{{route('data.destroy', $data)}}" method ="POST">
                        <a class="btn btn-primary" href="{{route('data.edit', $data)}}">Edit</a>
                        <a class="btn btn-primary" href="{{route('image.create', $data)}}">Upload Image</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</div>
<script>
    function readURL(input, id) {
        id = id || '#file-image';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(id).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            $('#file-image').removeClass('hidden');
            $('#start').hide();
        }
    }
</script>
@endsection
