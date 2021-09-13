@extends('template')

@section('title')
<div class="float-left">
    <h2><b>Tabel Kelas</b></h2>
</div>
@endsection
 


@section('body')
    @if (Session::get('success'))
    

    @endif
    <a class="btn btn-outline-primary mt-4 float-right ml-3" href="{{ route('kelas.create') }}" style="width: 300px;"><span class="fas fa-plus"> Tambahkan Data</a>
    <table id="example2" class="table table-hover m-3" style="width:98%">
                  <thead>
                  <tr style="background-color: #007bff; color: white;" class="text-center">
                    <th width="20px" class="text-center">No</th>
                    <th>Nama Kelas</th>
                    <th width="100px">Wali Kelas</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($kelas as $post)
                  <tr class="text-center">
                    <td class="text-center">{{ ++$i }}</td>
                    <td>{{ $post->namakelas }}</td>
                    <td  width="100px">{{ $post->walikelas }}</td>
                    <td class="text-center">
                        <form action="{{ route('kelas.destroy',$post->id) }}" method="POST">
                 
                            <a class="btn btn-primary btn-sm  far" style="font-family: 'Source Sans Pro', sans-serif;" href="{{ route('kelas.edit',$post->id) }}""><span class="fas fa-edit"></span></a>
        
                            @csrf
                            @method('DELETE')
        
                            <button type="submit" class="btn btn-danger btn-sm" style="font-family: 'Source Sans Pro', sans-serif;" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><span class="fas fa-trash"></span></button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>

    
 
    {!! $kelas->links() !!}
 
@endsection

@section('footer')
@endsection