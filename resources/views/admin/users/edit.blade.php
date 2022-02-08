@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование категории</h1>
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
                    <form action="{{ route('admin.user.update', $user->id) }}"  method="POST" class="w-25">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label >Имя пользователя</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Введите новое имя пользователя...">
                            @error('name')
                                <div class="text-danger mb-2" >{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >E-mail</label>
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Введите новый e-mail...">
                            @error('email')
                            <div class="text-danger mb-2" >{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label>Выбор роли</label>
                            <select name="role" class="form-control">
                                @foreach($roles as $id => $role)
                                    <option {{ $id == $user->role ? 'selected' : '' }} value="{{ $id }}">{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="text-danger mb-2" >{{ $message }}</div>
                            @enderror
                            <div class="form-group w-50">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                            </div>
                        </div>
                        <a href="{{ route('admin.user.index')}}"><input type="submit" class="btn btn-primary" value="Обновить"></a>
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