<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100vh;">
        <div class="container" style="width: 100%;">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertProductModal">Add Product</button>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
    @include('modal.insertProduct')
    <script>
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
           $('#addProduct').on('click', function(e){
                e.preventDefault();
                let productName = $('#productName').val();
                let productPrice = $('#productPrice').val();
                let description = $('#description').val();

                let inputValue = {
                    productName,productPrice,description
                }

                console.log(inputValue);
                $.ajax({
                        url: '{{ route('addProduct') }}',
                        type: 'POST', // Use POST method to send data
                        data: inputValue, // Send the product data to the server
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for Laravel security
                        },
                        success: function(res) {
                            if(res.success){
                                $("#addProductForm")[0].reset();
                                $('#insertProductModal').modal('hide');
                                alert("Product added successfully");
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle error response
                            console.error(error);
                            // You can handle errors and show appropriate messages to the user
                        }
                    });
           })
        });
    </script>
  </body>
</html>