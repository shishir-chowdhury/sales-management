<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Single Supplier Info</title>

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
        @foreach ($data as $id => $supplier )
        <div class="">
            <p class="text-center h1 bg-info" style="padding:10px">{{$supplier->supplier_name}} Information</p>
            {{-- <table class="table table-bordered table-striped text-center">
                <tr class="">
                    <th class="" style="background-color:lightblue">Client ID</th>
                    <th
                    <th class="" style="background-color:lightblue">Client Name</th>
                    <th  style="background-color:lightblue">Address</th>
                    <th class="" style="background-color:lightblue">Phone</th>
                    <th style="background-color:lightblue">Contact Person</th>
                    <th style="background-color:lightblue">Active/Inactive</th>
                <tr>
                    <td>{{$client->client_id}}</td>
                    <td>{{$client->client_name}}</td>
                    <td>{{$client->address}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->contact_person}}</td>
                    <td>{{$client->act_inact}}</td>
                </tr>
            </table> --}}

<section style="background-color: #eee;">
  <div class="container py-3">
    <a class="" href="/viewclient"><button class="btn btn-success" style="margin-bottom: 10px" >All Suppliers</button></a>
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4" style="background-color:lightblue">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/viewclient">Client Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid m-auto" style="width: 200px;">
            <h5 class="my-3">{{$supplier->supplier_name}}</h5>
            <p class="text-muted mb-4">{{$supplier->address}}</p>
             <p class="text-muted mb-4">(+88){{$supplier->phone}}</p>

          </div>
        </div>

      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body" style="height: 392px; line-height:58px">
            <div class="row" style="">
              <div class="col-sm-3">
                <p class="mb-0">supplier Id</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$supplier->supplier_id}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Supplier Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$supplier->supplier_name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$supplier->email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$supplier->address}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">(+88) {{$supplier->phone}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Contact Person</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$supplier->contact_person}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endforeach
    </div>
    </div>
</div>
            </main>
        </div>
    </body>
</html>

