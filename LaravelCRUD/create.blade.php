@extends('tableLayout')

@section ('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h3>Add New Data</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('data.index')}}"> Back to Datas </a>
            </div>
        </div>
    </div>

    <form action="{{route('data.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <strong>data1</strong>
                    <input type="string" name="data1" class="form-control" placeholder="data1">

                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <strong>data2</strong>
                    <input type="string" name="data2" class="form-control" placeholder="data2">

                </div>
            </div>
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
