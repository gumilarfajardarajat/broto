<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Basic Table</h2>         
  <table class="table">
    <thead>
      <tr>
        <th>Kode Menu</th>
        <th>Nama Menu</th>
        <th>Keterangan</th>
        <th>Status</th>
        <th>Gambar</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
    @foreach($menu as $m)
      <tr>
        <td>{{$m->kode_menu}}</td>
        <td>{{$m->nama_menu}}</td>
        <td>{{$m->keterangan}}</td>
        <td>{{$m->status}}</td>
        <td>{{$m->gambar}}</td>
        <td>{{$m->harga}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
