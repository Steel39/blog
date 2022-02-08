@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование тэга</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.tag.update', $tag->id) }}"  method="POST" class="w-25">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label >Название</label>
                            <input type="text" class="form-control" name="title" value="{{ $tag->title }}" placeholder="Введите новую категорию...">
                            @error('title')
                                <div class="text-danger mb-2" >Это поле не должно быть пустым</div>
                            @enderror
                        </div>
                        <a href="{{ route('admin.tag.index')}}"><input type="submit" class="btn btn-primary" value="Обновить"></a>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
