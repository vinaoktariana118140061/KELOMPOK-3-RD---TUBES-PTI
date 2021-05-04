<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Pemasok</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> Data Pemasok
          <small class="float-right">Date: {{ date('D-M-Y') }} </small>
        </h2>
      </div>
    </div>
    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Masuk</th>
                <th>Pemasok</th>
                <th>Alamat</th>
                <th>Kategori</th>
                <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 0; ?>
            @foreach ($collection as $item)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->kategori }}</td>
                    @if ($item->status == 1)
                        <td>Aktif</td>
                    @else
                        <td>Tidak Aktif</td>
                    @endif
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>
</body>
</html>
