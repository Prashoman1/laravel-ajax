<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="insertProductModal" tabindex="-1" aria-labelledby="insertProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Add Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <form action="" method="POST" id="addProductForm">
            @csrf
            <div class="py-2">
                <label for="" class="form-label">product Name</label>
                <input type="text" class="form-control" id="productName" name="productName">
            </div>
            <div class="py-2">
                <label for="" class="form-label">product Price</label>
                <input type="text" class="form-control" id="productPrice" name="productPrice">
            </div>
            <div class="py-2">
                <textarea name="description" id="description" class="form-control" cols="3" rows="4"></textarea>
                <label for="" class="form-label">product description</label>
                
            </div>
         </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="addProduct">Save </button>
        </div>
      </div>
    </div>
  </div>