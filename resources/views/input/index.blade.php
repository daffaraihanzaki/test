@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Judul</td>
          <td>Tenerbit</td>
          <td>Tahun Terbit</td>
          <td>Pengarang</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($perpustakaan as $perpustakaan)
        <tr>
            <td>{{$perpustakaan->id}}</td>
            <td>{{$perpustakaan->judul}}</td>
            <td>{{$perpustakaan->penerbit}}</td>
            <td>{{$perpustakaan->tahun_terbit}}</td>
            <td>{{$perpustakaan->pengarang}}</td>
            <td><a href="{{ route('perpustakaan.edit',$perpustakaan->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('perpustakaan.destroy', $perpustakaan->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection