<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Client Info</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
<div data-bs-theme="light"class="container">
    <div class="row" style="margin: 100px">
        <div class="">
            <p class="text-center h1 bg-info" style="padding:10px">All Users List</p>
            <a class="" href="/newclientform"><button class="btn btn-success" style="margin-bottom: 7px" >Add Client</button></a>

            {{-- Status Update --}}
            @if(session('status'))
                <div id="alert-mgs" class="alert alert-success">{{session('status')}}<button type="button" class="close float-end" data-dismiss="alert">X</button></div>
            @endif

            <table class="table table-bordered table-striped text-center">
                <tr class="">
                    <th class="" style="background-color:lightblue">Client Name</th>
                    <th  style="background-color:lightblue">Address</th>
                    <th class="" style="background-color:lightblue">Phone</th>
                    <th style="background-color:lightblue">Contact Person</th>
                    <th style="background-color:lightblue">Active/Inactive</th>
                    <th class="" style="background-color:lightblue">Options</th>
                </tr>

                @foreach ($data as $id => $client )

                <tr>
                    <td>{{$client->client_name}}</td>
                    <td>{{$client->address}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->contact_person}}</td>
                    <td>{{$client->act_inact}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('single.client', $client->client_id)}}">View</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('update.client.info', $client->client_id) }}">Update</a>
                        <a class="btn btn-danger btn-sm" href="{{route('delete.client', $client->client_id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</main>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
   $("document").ready(function()
    {
        $('#alert-mgs').delay(2000).fadeOut();
    },10000);
</script>
</body>
</html>

