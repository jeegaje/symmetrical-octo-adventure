  <div class="row">
    <div class="col-12">
      @if ($showAllProduct)

      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Daftar Produk</h6>
          <a class="btn btn-primary" data-bs-toggle="collapse" href="#addProductModal" role="button" aria-expanded="false" aria-controls="addProductModal">
            Tambah Produk
          </a>
        </div>
        <div class="collapse" id="addProductModal">
            <div class="form-group">
              <label for="product-name" class="form-control-label">Nama Produk</label>
              <input class="form-control" type="text" name="product-name" id="product-name" wire:model.defer="productName">
            </div>
            <div class="form-group">
              <label for="product-description" class="form-control-label">Deskripsi</label>
              <textarea class="form-control" type="text" name="product-description" id="product-description" wire:model.defer="productDescription"></textarea>
            </div>
            <div class="form-group">
              <label for="product-price" class="form-control-label">Harga</label>
              <input class="form-control" type="number" name="product-price" id="product-price" wire:model.defer="productPrice">
            </div>
            <div class="form-group">
              <label for="product-status">Status</label>
              <select class="form-control" id="product-status" wire:model.defer="productStatus">
                <option selected>Pilih Status</option>
                <option value="1">Aktif</option>
                <option value="0">Non-Aktif</option>
              </select>
            </div>
            <div class="form-group">
              <label for="product-stock" class="form-control-label">Stok</label>
              <input class="form-control" type="number" name="product-stock" id="product-stock" wire:model.defer="productStock">
            </div>
            <button wire:click="addProduct()">Tambah</button>
        </div>
  
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Produk</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Stok</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                <tr>
                  <td>
                    <div class="d-flex px-2">
                      <div class="my-auto">
                        <h6 class="mb-0 text-sm">{{ $product->name }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-sm font-weight-bold mb-0">{{ $product->description }}</p>
                  </td>
                  <td>
                    <p class="text-sm font-weight-bold mb-0">{{ $product->price }}</p>
                  </td>
                  <td>
                    <span class="badge badge-dot me-4">
                      <i class="bg-info"></i>
                      <span class="text-dark text-xs">{{ $product->status == 1 ? 'aktif' : 'nonaktif' }}</span>
                    </span>
                  </td>
                  <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                      <span class="me-2 text-xs font-weight-bold">{{ $product->stock }}</span>
                    </div>
                  </td>
                  <td class="align-middle">
                    <button type="button" class="btn bg-gradient-success btn-block mb-3" wire:click="showUpdateModal({{ $product->id }})" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id   }}">
                      <i class="fa fa-pencil"></i>
                    </button>
                    <a class="btn btn-primary" data-bs-toggle="collapse"  href="#editModalProduct{{ $product->id }}" wire:click="deleteProduct({{ $product->id }})" role="button" aria-expanded="false" aria-controls="editModalProduct{{ $product->id }}">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <div wire:ignore.self class="modal fade" id="editProductModal{{ $product->id  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="product-name" class="form-control-label">Nama Produk</label>
                            <input class="form-control" type="text" name="product-name" id="product-name" wire:model.defer="productName">
                          </div>
                          <div class="form-group">
                            <label for="product-description" class="form-control-label">Deskripsi</label>
                            <textarea class="form-control" type="text" name="product-description" id="product-description" wire:model.defer="productDescription"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="product-price" class="form-control-label">Harga</label>
                            <input class="form-control" type="number" name="product-price" id="product-price" wire:model.defer="productPrice">
                          </div>
                          <div class="form-group">
                            <label for="product-status">Status</label>
                            <select class="form-control" id="product-status" wire:model.defer="productStatus">
                              <option value="1" {{ $productStatus == 1 ? 'selected' : '' }}>Aktif</option>
                              <option value="0" {{ $productStatus == 0 ? 'selected' : '' }}>Non-Aktif</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="product-stock" class="form-control-label">Stok</label>
                            <input class="form-control" type="number" name="product-stock" id="product-stock" wire:model.defer="productStock">
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn bg-gradient-primary" wire:click="updateProduct({{ $product->id }})">Edit Produk</button>
                      </div>
                    </div>
                  </div>
                </div>

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>