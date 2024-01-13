<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Add Item Form</title>
</head>
<body>
    <div class="container" style="padding:50px">
        <div class="row w-50 m-auto" style="background-color: #D4F1F4">
            <div class="col-4"></div>
            <h1 class="bg-info text-center" style="padding: 15px">Add New Item</h1>
            {{-- {{ route('add.client') }} --}}
            <form action="{{ route('add.item') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Item Name</label>
                    <input type="text" class="form-control" name="item_name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" class="form-control" name="company_name">
                </div>
                <div class="mb-3">
                    <label class="form-lable">Unit Price</label>
                    <input type="text" class="form-control" name="unit_price">
                </div>
                <button type="submit" class="btn btn-info" >Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
