<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead's</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    .table-dark td, .table-dark th, .table-dark thead th {
    border-color: #454d55a1;
    text-align: center;
    }
    </style>
</head>
<body class="bg-dark ">
    <div class="container ">  
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h1 class="text-white-50">Lead Center</h1>
        </div>        
        <table class="table table-striped table-dark">
            <thead >
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Description</th>
                    <th>Report</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $lead)
                    <tr>
                        <td>{{$lead->id}}</td>
                        <td>{{ $lead->created_at }}</td>
                        <td>{{ $lead->description }}</td>
                        <td>
                            <a href="{{ route('lead.report', $lead->id) }}">
                                <i class="bi bi-pencil-square text-white-50 hover-icon "></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>