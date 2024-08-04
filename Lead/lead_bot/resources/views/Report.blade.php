<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .card {
            margin: 20px 0;
        }
        .card-header {
            background-color: #454c53;
            color: #fff;
        }
        .card-body {
            background-color: #2e3439;
            color: #fff;
        }
        .input {
            background-color: #2e3439;
            block-size: 20px 10px;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <div class="card border-warning">
                <div class="card-header text-center">Lead Information</div>
                <div class="card-body">
                  <p><strong>Phone Number:</strong> {{ $lead->phone_number }}</p>
                  <p><strong>Lead Source ID:</strong> {{ $lead->lead_source_id }}</p>
                  <p><strong>Description:</strong> {{ $lead->description }}</p>
                  <p><strong>Email:</strong> {{ $lead->email }}</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
              <div class="card border-warning">
                <div class="card-header text-center">Last Activity</div>
                <div class="card-body">
                  <form action="{{ route('report.submit') }}" method="POST">
                    @csrf
                    <p><strong>Created At:</strong> {{ $lead->created_at }}</p>
                    <p><strong>Report:</strong>
                      <input type="text" class="border-warning bg-dark text-white" id="report" name="report">
                      <input type="hidden" name="lead_id" value="{{ $lead->id }}">
                      <button type="submit" class="btn border-warning text-white p-1">Submit</button>
                    </p>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>
