@include('../layouts.header')
@include('../layouts.navbar')
@include('../layouts.sidebar')

{{-- Content --}}
<div class="col-md-10 p-5 pt-2">
    <h3><i class="fas fa-tachometer-alt mr-2"></i>Daftar Transaksi</h3>
    <hr>

    <a href="" class="btn btn-primary mb-3 shadow"><i class="fas fa-plus-square mr-1"></i> Tambah Data Transaksi</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data transaksi</h6>
          
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>nis</th>
                    <th>Nama</th>
                    <th>tahun ajar</th>
                    <th>Jurusan</th>
                    <th>jenis Kelamin</th>
                    <th>wali</th>
                    <th>telpon wali</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>0088201</td>
                    <td>raka</td>
                    <td>2020</td>
                    <td>rpl</td>
                    <td>laki laki</td>
                    <td>Dian Aryani</td>
                    <td>0776626718</td>
                    <td>
                        <a href="#" class="btn btn-primary">Detail</a>
                        <a href="#" class="btn btn-warning">edit</a>
                        <a href="#" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Mengapus Data Ini?')">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>0088201</td>
                    <td>raka</td>
                    <td>2020</td>
                    <td>rpl</td>
                    <td>laki laki</td>
                    <td>Dian Aryani</td>
                    <td>0776626718</td>
                    <td>
                        <a href="#" class="btn btn-primary">Detail</a>
                        <a href="#" class="btn btn-warning">edit</a>
                        <a href="#" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Mengapus Data Ini?')">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>0088201</td>
                    <td>raka</td>
                    <td>2020</td>
                    <td>rpl</td>
                    <td>laki laki</td>
                    <td>Dian Aryani</td>
                    <td>0776626718</td>
                    <td>
                        <a href="#" class="btn btn-primary">Detail</a>
                        <a href="#" class="btn btn-warning">edit</a>
                        <a href="#" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Mengapus Data Ini?')">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>0088201</td>
                    <td>raka</td>
                    <td>2020</td>
                    <td>rpl</td>
                    <td>laki laki</td>
                    <td>Dian Aryani</td>
                    <td>0776626718</td>
                    <td>
                        <a href="#" class="btn btn-primary">Detail</a>
                        <a href="#" class="btn btn-warning">edit</a>
                        <a href="#" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Mengapus Data Ini?')">Delete</a>
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
    </div>

    @include('../layouts.js')