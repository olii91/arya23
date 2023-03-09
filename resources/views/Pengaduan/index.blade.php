@extends('layouts.app')

@section('content')
<div class="card">
   <div class="card-body">
       @if (session('status'))
           <div theme="success" title="Sukses">
               {{session('status')}}
            </div>
       @endif
       @if ($errors->any())
           <div theme="success" title="Sukses">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
       @endif
       <a href="{{route('masyarakat.create')}}" class="btn btn-md btn-success mx-1 shadow"><i class="fa fa-lg fa-fw fa-plus"></i> Tambah User</a>
       <br/> <br/>
       <div class="table-responsive">
           <table id="tabel_user" class="table table-striped table-hover table-condensed table-bordered">
               <thead style="background-color: darkgray">
                   <tr>
                       <th>No</th>
                       <th>Username</th>
                       <th>Nama</th>
                       <th>Email</th>
                       <th>Telpon</th>
                       <th>Level</th>
                       <th class="text-center" width="70">Aksi</th>
                   </tr>
               </thead>
               <tbody>
               @foreach($user as $user)
                   <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$user->username}}</td>
                       <td>{{$user->name}}</td>
                       <td>{{$user->email}}</td>
                       <td>{{$user->telpon}}</td>
                       <td>{{$user->level}}</td>
                           <td>
                           <a href="{{route('user.edit', $user->id)}}" class="btn btn-sm btn-primary" title="edit">EDIT</a>
                           <form action="{{ route('user.delete', $user->id) }}" 
                            method="post" class="d-inline">
                             @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                         </form>
                           </td>
                         </tr>
                       @endforeach
               </tbody>
           </table>
       </div>
   </div>
</div>
@stop
