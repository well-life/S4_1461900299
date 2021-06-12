<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even){
            background-color: #32F71E
        }
        .button {
            background-color: #150476;
            border: none;
            color: white;
            padding: 5px 32px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
    }
    </style>

</head>

<body>
<div class="container">
        <div class="col-md-12">
            <div style="height: 15px;"></div>
            <div class="row">
                <a href="/exportPasien" class="btn btn-success">Export Excel</a>
                <div style="width: 10px;"></div>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importExcel">
                    Import Excel
                </button>
            </div>

            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="/importPasien" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                            </div>
                            <div class="modal-body">

                                {{ csrf_field() }}
                                <label>Pilih file excel</label>
                                <div class="form-group">
                                    <input type="file" name="file" required="required">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <br><br>
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Id</th>
                    <th>Nama Siswa</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                @foreach($pasien as $key => $ps)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $ps->id}}</td>
                    <td>{{ $ps->nama }}</td>
                    <td>{{ $ps->alamat }}</td>
                    <td>
                    <form action="{{ route('pasien.destroy', $ps->id) }}" method="POST">
                        <button type="submit" class="btn btn-danger">Edit</button>
                        {!! method_field('delete') . csrf_field() !!}
                        <button type="submit" class="btn btn-primary mr-5">Delete</button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</body>
</html>