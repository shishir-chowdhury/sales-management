<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Add Invoice</title>
</head>
<body>
    <div class="container" style="padding:50px">
        <div class="row w-100 m-auto" style="background-color: #D4F1F4">
            <div class="col-4"></div>
            <h1 class="bg-info text-center" style="padding: 15px">Add Invoice</h1>
            {{-- {{ route('add.client') }} --}}
            <form action="" method="POST">
                @csrf
                <h3 class="" style="padding: 15px; background-color:#00EAD9;">Invoice Main</h3>

                <div class="mb-3">
                    <table class="table">
                        <tr class="input-group">
                            <td class="input-group w-25">
                                <label class="form-label me-3 ">Invoce No</label>
                                <input type="text" class="form-control" name="invoice-no" placeholder="auto genarate">
                            </td>
                            <td class="input-group w-25">
                                <label class="form-label me-3">Invoice date</label>
                                <input type="text" class="form-control" name="invoice-date" placeholder="auto genarate">
                            </td>
                        </tr>
                        <tr class="">
                            <td class="input-group w-50">
                                <label class="form-label me-3 ">Cliet Name</label>
                                     <select name="" id="getClientId" class="form-control form-select form-select-lg mb-3 wrapper" name="client-id" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                                        @foreach ($data2 as $id => $client)
                                            <option value="{{$client->client_id}}">{{$client->client_name}}</option>
                                        @endforeach
                                    </select>

                            </td>
                            <td class="input-group">
                                <label class="form-label me-3 ">Address</label>
                                <input type="text" id="calient-address" class="form-control me-3" name="address">
                                </input>
                                <label class="form-label me-3 ">Remarks</label>
                                <textarea type="text" class="form-control" name="remarks">
                                </textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            <h3 class="" style="padding: 15px; background-color:#00EAD9; margin-top:-8px">Item List</h3>
            <p id="add-new-item" class="float-end btn btn-info">Add New Item</p>
            <div>
                <table id="sub-table" class="table table-striped ">
                   <thead>
                     <tr>
                          <th scope="col">Item Id</th>
                          <th scope="col">Item Name</th>
                          <th scope="col">Company Name</th>
                          <th scope="col">Unit Price</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Amount</th>
                     </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                         <th scope="row"></th>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td class="text-end" >Vat. 7%</td>
                         <td>$45</td>
                     </tr>
                     <tr>
                         <th scope="row"></th>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td class="text-end" >Discount. 5%</td>
                         <td>$25</td>
                     </tr>
                     <tr>
                         <th scope="row"></th>
                         <td></td>
                         <td></td>
                         <td></td>
                         <th class="text-end" >Total:</th>
                         <th>$4500</th>
                     </tr>
                </tfoot>
              </table>
                <button type="submit" class=" float-end btn btn-info" style="" >Submit</button>
            </form>
        </div>
    </div>
    {{-- Modal --}}
    <div id="modal">
        <div id="modal-form">
            <h2 style="text-align:center; padding:15px" class="bg-info" >Add New Item On Item List</h2>
            <p style="padding:15px; background-color:#00EAD9">Select Item Name From The Dropdown Then Enter The Quantity</p>
            <table id="" class="table table-striped">
                   <thead>
                     <tr>
                          <th scope="col">Item Id</th>
                          <th scope="col">Item Name</th>
                          <th scope="col">Company Name</th>
                          <th scope="col">Unit Price</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Amount</th>
                     </tr>
                </thead>
                <tbody id="modal-data">
                    <tr class="modal-row">
                        <td scope="row">
                            <input type="text" id="item-id" class="form-control me-3" name="address">
                            </input>
                        </td>
                        <td>
                            <select id="item-name" class="form-select  form-select-lg mb-3" name="client-id">
                                 @foreach ($data1 as $id => $item)
                                    <option value="{{$item->item_id}}">{{$item->item_name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input id="company-name" class="form-control" type="text" placeholder="Company Name"></td>
                        <td><input id="unit-price" class="form-control" type="text" placeholder="Unit Price"></td>
                        <td><input id="quantity" class="form-control" type="number" placeholder="Enter Quantity"></td>
                        <td><input id="amount" class="form-control" type="text" placeholder="Amount"></td>
                    </tr>
                </tbody>
              </table>
              <p id="add-to-table" class="float-end btn btn-info">Add</p>
    {{--End Modal  --}}
            <div id="close-btn">
                x
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $( document ).ready(function()
        {
            // Get the client id from dropdown and pass through ajax
            $('#getClientId').change(function()
            {
                let clientId = $(this).val();
                // alert(clientId);
                $.ajax({
                    url: '/getclientid',
                    type: 'post',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        clint_id:clientId
                    },
                    success:function(result){
                        $('#calient-address').val(result);
                    }
                });
            });

            // Get the item id from dropdown and pass through ajax
            $('#item-name').change(function()
            {
                let itemId = $(this).val();
                // alert(itemId);
                $.ajax(
                {
                    url: '/getitemid',
                    type: 'post',
                    data:{
                        "_token": "{{ csrf_token() }}",
                        item_id:itemId
                    },
                    success:function(result)
                    {
                        var companyId = result[0].item_id;
                        var companyName = result[0].company_name;
                        var unitPrice = result[0].unit_price;
                        $('#item-id').val(companyId);
                        $('#company-name').val(companyName);
                        $('#unit-price').val(unitPrice);
                        $('#quantity').on('change', function()
                             {
                                var quant = $('#quantity').val();
                                var amount = unitPrice * quant;
                                $('#amount').val(amount);
                             });
                    }
                });
            });

        //Show Data In Modal Box
        $(document).on("click", "#add-new-item", function()
        {
            $("#modal").show();
            var studentId = $(this).data("id");
        });
        //Hide Modal Box
        $("#close-btn").on("click", function()
        {
            $("#modal").hide();
        });

        // Add row to the table
        let btnAdd = document.querySelector('#add-to-table');
        let subTable = document.querySelector('#sub-table');

        let idInputModal = document.querySelector('#item-id');
        let companyNameInputModal = document.querySelector('#company-name');
        let unitPriceInputModal = document.querySelector('#unit-price');
        let quantityInputModal = document.querySelector('#quantity');
        let amountInputModal = document.querySelector('#amount');

        btnAdd.addEventListener('click', () =>
        {
            // Get the value of selected options
            let itemNameInputModal = document.getElementById('item-name');
            let itemNameInputModalText = itemNameInputModal.options[itemNameInputModal.selectedIndex].text;

            let idInput = idInputModal.value;
            let companyNameInput = companyNameInputModal.value;
            let unitPriceInput = unitPriceInputModal.value;
            let quantityInput = quantityInputModal.value;
            let amountInput = amountInputModal.value;

            let template =`
                    <tr>
                        <td>${idInput}</td>
                        <td>${itemNameInputModalText}</td>
                        <td>${companyNameInput}</td>
                        <td>${unitPriceInput}</td>
                        <td>${quantityInput}</td>
                        <td>${amountInput}</td>
                    </tr>`;
            subTable.innerHTML += template;
        })
     });
    </script>
    <style>
        /* .wrapper{
        width:400px;
        padding:20px;
        height: 150px;
} */

    #modal {
    background-color: rgba(0, 0, 0, 0.7);
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 100;
    display: none;
}

#modal-form {
    background-color: #fff;
    width: 50%;
    height: 350px;
    position: relative;
    top: 16%;
    left: 30%;
    padding: 15px;
    border-radius: 5px;
}

#close-btn {
    background-color: red;
    color: #fff;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    border-radius: 50px;
    position: absolute;
    top: -15px;
    right: -15px;
    cursor: pointer;
}
    </style>
</body>
</html>

