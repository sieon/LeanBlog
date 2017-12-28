@extends('layouts.app')
@section('title', '首页')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">控制台</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    首页方法
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
