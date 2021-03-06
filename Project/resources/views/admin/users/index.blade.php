@extends('admin.main');
@section('content')
    <div>
        <h3>Danh Sách Người dùng</h3>
        <div class="row">
            <div class="col"> <a href="{{ route('user.create') }}" class="btn btn-primary ">THÊM</a></div>
            <div class="col"> @if (Session::has('success'))
                <p style="color: blue">{{ Session::get('success') }}</p>
            @endif</div>
            <div class="col"> <a href="{{ route('user-trashed') }}"> <button type="subit" class="btn btn-labeled btn-danger">
                    <span class="btn-label"><i class="fa fa-trash"></i>Thùng Rác</span></button></a></div>
           
           
           
        </div>
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Tên</td>
                    <td>Email</td>
                    <td> Số Điện Thoại</td>
                    <td> Thao tác</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key }}</a> </td>
                        <td> {{ $user->name }}</a></td>
                        <td> {{ $user->email }}</a></td>
                        <td>{{ $user->phone }}</a></td>
                        <td> <a href="{{ route('user.show', $user->id) }}"><i class='bx bx-info-circle'></i></i></a>
                            <a href="{{ route('user.edit', $user->id) }}"><i class='bx bxs-edit'></i></a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                {{-- <input type="submit" value="DElete"> --}}
                                <button type="subit" class="btn btn-labeled btn-danger" 
                                onclick="return confirm('Bạn muốn xóa  {{ $user->name }} ?!!!')">
                                    <span class="btn-label"><i class="fa fa-trash"></i></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $users->links() }}
    </div>
@endsection
