@extends('Backend.Layout.MasterLayout')
@section('Content')
    <div class="page-header reveal">
        <div>
            <h1 class="page-title">Product Management</h1>
            <p class="page-subtitle">Manage products, pricing, stock & many-to-many category relations</p>
        </div>
        <a href="{{ route('product.create.view') }}" class="btn-gradient text-decoration-none">
            <i class="fa-solid fa-plus me-1"></i> Add New Product
        </a>
    </div>

    <div class="admin-card reveal">

        <!-- Toolbar -->
        <div class="prod-toolbar">
            <div class="prod-search-wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="form-control" id="prodSearchInput" placeholder="Search by name or SKU...">
            </div>

            <select class="prod-filter-select" id="prodStockFilter">
                <option value="all">All Stock</option>
                <option value="in">In Stock</option>
                <option value="low">Low Stock</option>
                <option value="out">Out of Stock</option>
            </select>

            <select class="prod-filter-select" id="prodCategoryFilter">
                <option value="all">All Categories</option>
                <option value="Electronics">Electronics</option>
                <option value="Smartphones">Smartphones</option>
                <option value="Laptops & PCs">Laptops & PCs</option>
                <option value="Men's Fashion">Men's Fashion</option>
                <option value="Casual Shirts">Casual Shirts</option>
                <option value="Gadgets">Gadgets</option>
            </select>

            <span class="ms-auto text-muted small d-none d-lg-inline">
                Total: <strong class="text-dark">3</strong> products
            </span>
        </div>

        <!-- Responsive Table -->
        <div class="responsive-table">
            <table>
                <thead>
                    <tr>
                        <th style="width:70px;">#ID</th>
                        <th>Product</th>
                        <th>Categories</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="prodTableBody">

                    <!-- Product 1 -->
                    <tr data-stock="in" data-cats="Electronics,Smartphones,Gadgets">
                        <td data-label="ID"><span class="order-id">#101</span></td>
                        <td data-label="Product Name">
                            <div class="prod-info-cell">
                                <div class="prod-thumb"><i class="fa-solid fa-mobile-screen"></i></div>
                                <div>
                                    <p class="prod-name">Wireless Pro Smartphone</p>
                                    <span class="prod-sku">SKU: WPS-990</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Categories">
                            <div class="prod-cat-tags">
                                <span class="prod-cat-tag">Electronics</span>
                                <span class="prod-cat-tag">Smartphones</span>
                                <span class="prod-cat-tag">Gadgets</span>
                            </div>
                        </td>
                        <td data-label="Price"><span class="prod-price">$699.00</span></td>
                        <td data-label="Stock">
                            <span class="prod-stock prod-stock-in">45 in stock</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="prod-actions">
                                <button class="btn-icon-action btn-view" title="View" data-bs-toggle="modal"
                                    data-bs-target="#viewProductModal">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editProductModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteProductModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Product 2 -->
                    <tr data-stock="low" data-cats="Electronics,Laptops &amp; PCs">
                        <td data-label="ID"><span class="order-id">#102</span></td>
                        <td data-label="Product Name">
                            <div class="prod-info-cell">
                                <div class="prod-thumb"><i class="fa-solid fa-laptop"></i></div>
                                <div>
                                    <p class="prod-name">Ultra Slim Laptop 15"</p>
                                    <span class="prod-sku">SKU: USL-402</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Categories">
                            <div class="prod-cat-tags">
                                <span class="prod-cat-tag">Electronics</span>
                                <span class="prod-cat-tag">Laptops & PCs</span>
                            </div>
                        </td>
                        <td data-label="Price"><span class="prod-price">$1,250.00</span></td>
                        <td data-label="Stock">
                            <span class="prod-stock prod-stock-low">12 in stock</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="prod-actions">
                                <button class="btn-icon-action btn-view" title="View" data-bs-toggle="modal"
                                    data-bs-target="#viewProductModal">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editProductModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteProductModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Product 3 -->
                    <tr data-stock="in" data-cats="Men's Fashion,Casual Shirts">
                        <td data-label="ID"><span class="order-id">#103</span></td>
                        <td data-label="Product Name">
                            <div class="prod-info-cell">
                                <div class="prod-thumb"><i class="fa-solid fa-shirt"></i></div>
                                <div>
                                    <p class="prod-name">Casual Cotton Shirt</p>
                                    <span class="prod-sku">SKU: CCS-110</span>
                                </div>
                            </div>
                        </td>
                        <td data-label="Categories">
                            <div class="prod-cat-tags">
                                <span class="prod-cat-tag">Men's Fashion</span>
                                <span class="prod-cat-tag">Casual Shirts</span>
                            </div>
                        </td>
                        <td data-label="Price"><span class="prod-price">$35.00</span></td>
                        <td data-label="Stock">
                            <span class="prod-stock prod-stock-in">120 in stock</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="prod-actions">
                                <button class="btn-icon-action btn-view" title="View" data-bs-toggle="modal"
                                    data-bs-target="#viewProductModal">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editProductModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteProductModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="prod-empty d-none" id="prodEmptyState">
                <i class="fa-solid fa-box-open"></i>
                <p class="mb-0">No products found matching your filters.</p>
            </div>
        </div>
    </div>

    <!-- ============ VIEW PRODUCT MODAL ============ -->
    <div class="modal fade" id="viewProductModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-box me-2"></i> Product Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <div class="prod-thumb mx-auto" style="width:70px;height:70px;font-size:1.7rem;">
                            <i class="fa-solid fa-mobile-screen"></i>
                        </div>
                        <h6 class="fw-bold mt-2 mb-1">Wireless Pro Smartphone</h6>
                        <span class="prod-sku">SKU: WPS-990</span>
                    </div>

                    <div class="prod-view-row">
                        <span class="label">ID</span>
                        <span class="value">#101</span>
                    </div>
                    <div class="prod-view-row">
                        <span class="label">Price</span>
                        <span class="value">$699.00</span>
                    </div>
                    <div class="prod-view-row">
                        <span class="label">Stock</span>
                        <span class="value">45 units</span>
                    </div>
                    <div class="prod-view-row">
                        <span class="label">Status</span>
                        <span class="value">
                            <span class="prod-stock prod-stock-in">In Stock</span>
                        </span>
                    </div>
                    <div class="prod-view-row">
                        <span class="label">Categories</span>
                        <span class="value">
                            <div class="prod-cat-tags justify-content-end mt-1">
                                <span class="prod-cat-tag">Electronics</span>
                                <span class="prod-cat-tag">Smartphones</span>
                                <span class="prod-cat-tag">Gadgets</span>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ EDIT PRODUCT MODAL ============ -->
    <div class="modal fade" id="editProductModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-pen-to-square me-2"></i> Edit Product
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm">

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Product Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="Wireless Pro Smartphone" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">SKU Code</label>
                                <input type="text" class="form-control" value="WPS-990">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold small">Price ($) <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" value="699.00" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold small">Stock Quantity</label>
                                <input type="number" class="form-control" value="45">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold small">Status</label>
                                <select class="form-select">
                                    <option value="active" selected>Active</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-primary">
                                <i class="fa-solid fa-network-wired me-1"></i> Assigned Categories (Many-to-Many)
                            </label>
                            <div class="p-3 border rounded-3 bg-light">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="edit_cat1" checked>
                                            <label class="form-check-label small fw-medium"
                                                for="edit_cat1">Electronics</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="edit_cat2" checked>
                                            <label class="form-check-label small fw-medium"
                                                for="edit_cat2">Smartphones</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="edit_cat3">
                                            <label class="form-check-label small fw-medium" for="edit_cat3">Laptops &
                                                PCs</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="edit_cat4">
                                            <label class="form-check-label small fw-medium" for="edit_cat4">Men's
                                                Fashion</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="edit_cat5">
                                            <label class="form-check-label small fw-medium" for="edit_cat5">Casual
                                                Shirts</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="edit_cat6" checked>
                                            <label class="form-check-label small fw-medium" for="edit_cat6">Gadgets &
                                                Accessories</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Description</label>
                            <textarea class="form-control" rows="3">High performance wireless pro smartphone with amazing camera and battery life.</textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn-gradient" type="submit" form="editProductForm">
                        <i class="fa-solid fa-check me-1"></i> Update Product
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ DELETE CONFIRMATION MODAL ============ -->
    <div class="modal fade" id="deleteProductModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="prod-delete-icon">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Delete Product?</h5>
                    <p class="text-muted small mb-4">
                        This action cannot be undone. All related data will be permanently removed.
                    </p>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn-gradient"
                            style="background: linear-gradient(135deg,#EF4444,#DC2626); box-shadow:0 4px 12px rgba(239,68,68,0.3);">
                            <i class="fa-solid fa-trash me-1"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
