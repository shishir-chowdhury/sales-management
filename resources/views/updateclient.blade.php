<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Update User Form</title>
</head>
<body>
    <div class="container" style="padding:50px">
        <div class="row w-50 m-auto" style="background-color: #D4F1F4">
            <div class="col-4"></div>
            @foreach ($data as $id => $client)
            <h1 class="bg-info text-center" style="padding: 15px">Update Existing Client</h1>
            <form action="{{route('update.client', $client->client_id)}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Client Name</label>
                    <input type="text" class="form-control" value="{{$client->client_name}}"  name="client_name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" value="{{$client->address}}" class="form-control" name="address">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" value="{{$client->phone}}"  class="form-control" name="phone">
                </div>
                <div class="mb-3">
                    <label class="form-lable">Contact Person</label>
                    <input type="text" value="{{$client->contact_person}}"  class="form-control" name="contact_person">
                </div>
                <div class="mb-3">
                    <label class="form-label">Active/Inactive</label>
                    <select name="act_inact" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-info" >Update</button>
            </form>
        </div>
        @endforeach
    </div>
</body>
</html>
