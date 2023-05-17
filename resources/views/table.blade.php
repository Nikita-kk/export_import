<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<a href="{{route('customer.export')}}" class="btn-info">Export All Cutsomers</a>
<br>
<a href="{{route('customer.export_view')}}" class="btn-info">Export All Cutsomers view</a>

<a href="{{route('customer.export_store')}}" class="btn-info">Store As File</a>

<a href="{{route('customer.export_format','Csv')}}" class="btn-info">Download Csv</a>
<a href="{{route('customer.export_format','Html')}}" class="btn-info">Download HTML</a>
<a href="{{route('customer.export_format','Dompdf')}}" class="btn-info">Download PDF</a>

<a href="{{route('customer.export_sheets')}}" class="btn-info">Export into Multiple Sheets</a>

<a href="{{route('customer.export_heading')}}" class="btn-info">Export with heading Row</a>

<a href="{{route('customer.export_mapping')}}" class="btn-info">Export purchases</a>

<a href="{{route('customer.export_stying')}}" class="btn-info">Export with Stying</a>
<br>

<a href="{{route('customer.export_autosize')}}" class="btn-info">Export with autosize</a>


{{-- for Import --}}


{{-- for message --}}
<div class="panel-heading">customer</div>
<div class="panal-body">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

{{-- for export for dateformat --}}

<a href="{{route('customer.export_dateformat')}}" class="btn-sm btn-info">Export with Date Formats</a>

<br><br>



{{-- for file imoport --}}
<form action="{{route('customer.import')}}" method="post" enctype="multipart/form-data">
@csrf
<input type="file" name="import" />
<input type="submit" class="btn btn-sm btn-primary" value="Import File" />

</form>
</div>

{{-- for import dateformat --}}
<form action="{{route('customer.import_dateformat')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="import" />
    <input type="submit" class="btn btn-sm btn-primary" value="Import Dateformat" />

    </form>


<body>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">email</th>
            <th scope="col">created_at</th>
            <th scope="col">upadted_at</th>


          </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)

          <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->firstname}}</td>
            <td>{{$d->lastname}}</td>
            <td>{{$d->email}}</td>
            <td>{{$d->created_at}}</td>
            <td>{{$d->updated_at}}</td>


          </tr>
          @endforeach

        </tbody>
      </table>
</body>
</html>

