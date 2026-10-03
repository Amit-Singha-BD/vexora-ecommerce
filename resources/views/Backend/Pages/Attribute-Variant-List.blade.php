@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header -->
    <div class="page-header reveal">
        <div>
            <h1 class="page-title">Attributes & Variants</h1>
            <p class="page-subtitle">Manage global attributes, values & product-specific variant combinations</p>
        </div>
    </div>

    <!-- ========== SECTION 1: Global Attributes ========== -->
    <div class="admin-card reveal">
        <div class="attr-section-head">
            <div class="attr-section-title">
                <div class="attr-section-icon"><i class="fa-solid fa-tags"></i></div>
                <div>
                    <h2>Global Attributes & Values</h2>
                    <p>Master list of reusable attributes (Color, Size, RAM, etc.)</p>
                </div>
            </div>
            <a href="{{ route('attribute.create.view') }}" class="btn-gradient text-decoration-none">
                <i class="fa-solid fa-plus me-1"></i> Add Attribute
            </a>
        </div>

        <!-- Toolbar -->
        <div class="attr-toolbar">
            <div class="attr-search-wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="form-control" id="attrSearchInput" placeholder="Search attributes...">
            </div>
            <span class="ms-auto text-muted small d-none d-md-inline">
                Total: <strong class="text-dark">3</strong> attributes
            </span>
        </div>

        <!-- Responsive Table -->
        <div class="responsive-table">
            <table>
                <thead>
                    <tr>
                        <th style="width:70px;">#ID</th>
                        <th>Attribute Name</th>
                        <th>Associated Values</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="attrTableBody">

                    <tr>
                        <td data-label="ID"><span class="order-id">#1</span></td>
                        <td data-label="Attribute Name">
                            <div class="attr-name-cell">
                                <span class="attr-icon-box"><i class="fa-solid fa-palette"></i></span>
                                <span class="attr-name">Color</span>
                            </div>
                        </td>
                        <td data-label="Associated Values">
                            <div class="attr-value-tags">
                                <span class="attr-value-tag">Red</span>
                                <span class="attr-value-tag">Blue</span>
                                <span class="attr-value-tag">Black</span>
                                <span class="attr-value-tag">White</span>
                            </div>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="attr-actions">
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editAttributeModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteAttributeModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td data-label="ID"><span class="order-id">#2</span></td>
                        <td data-label="Attribute Name">
                            <div class="attr-name-cell">
                                <span class="attr-icon-box"><i class="fa-solid fa-ruler"></i></span>
                                <span class="attr-name">Size</span>
                            </div>
                        </td>
                        <td data-label="Associated Values">
                            <div class="attr-value-tags">
                                <span class="attr-value-tag">Small (S)</span>
                                <span class="attr-value-tag">Medium (M)</span>
                                <span class="attr-value-tag">Large (L)</span>
                                <span class="attr-value-tag">Extra Large (XL)</span>
                            </div>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="attr-actions">
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editAttributeModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteAttributeModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td data-label="ID"><span class="order-id">#3</span></td>
                        <td data-label="Attribute Name">
                            <div class="attr-name-cell">
                                <span class="attr-icon-box"><i class="fa-solid fa-memory"></i></span>
                                <span class="attr-name">RAM</span>
                            </div>
                        </td>
                        <td data-label="Associated Values">
                            <div class="attr-value-tags">
                                <span class="attr-value-tag">8GB</span>
                                <span class="attr-value-tag">16GB</span>
                                <span class="attr-value-tag">32GB</span>
                            </div>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="attr-actions">
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editAttributeModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteAttributeModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="attr-empty d-none" id="attrEmptyState">
                <i class="fa-solid fa-tag"></i>
                <p class="mb-0">No attributes found.</p>
            </div>
        </div>
    </div>

    <!-- ========== SECTION 2: Product Variants ========== -->
    <div class="admin-card reveal">
        <div class="attr-section-head">
            <div class="attr-section-title">
                <div class="attr-section-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                <div>
                    <h2>Product Variants & Inventory</h2>
                    <p>Specific product variant combinations with price & stock</p>
                </div>
            </div>
            <a href="{{ route('variant.create.view') }}" class="btn-gradient text-decoration-none">
                <i class="fa-solid fa-plus me-1"></i> Add Variant
            </a>
        </div>

        <!-- Toolbar -->
        <div class="attr-toolbar">
            <div class="attr-search-wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="form-control" id="variantSearchInput" placeholder="Filter variants...">
            </div>
            <select class="form-control" id="variantStockFilter"
                style="max-width:170px; height:42px; border-radius:30px; font-size:0.84rem; font-weight:500; padding:0 18px;">
                <option value="all">All Stock</option>
                <option value="in">In Stock</option>
                <option value="low">Low Stock</option>
            </select>
            <span class="ms-auto text-muted small d-none d-md-inline">
                Total: <strong class="text-dark">3</strong> variants
            </span>
        </div>

        <!-- Responsive Table -->
        <div class="responsive-table">
            <table>
                <thead>
                    <tr>
                        <th style="width:90px;">#ID</th>
                        <th>Product</th>
                        <th>Variant Combination</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="variantTableBody">

                    <tr data-stock="in">
                        <td data-label="ID"><span class="order-id">V-501</span></td>
                        <td data-label="Product">
                            <div class="attr-prod-cell">
                                <span class="attr-prod-thumb"><i class="fa-solid fa-shirt"></i></span>
                                <span class="attr-prod-name">Casual Cotton Shirt</span>
                            </div>
                        </td>
                        <td data-label="Variant Combination">
                            <div class="attr-variant-combo">
                                <span class="attr-variant-chip"><strong>Color:</strong> Blue</span>
                                <span class="attr-variant-chip"><strong>Size:</strong> Medium (M)</span>
                            </div>
                        </td>
                        <td data-label="Price"><span class="prod-price">$35.00</span></td>
                        <td data-label="Stock">
                            <span class="attr-stock attr-stock-in">50 in stock</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="attr-actions">
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editVariantModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteVariantModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr data-stock="low">
                        <td data-label="ID"><span class="order-id">V-502</span></td>
                        <td data-label="Product">
                            <div class="attr-prod-cell">
                                <span class="attr-prod-thumb"><i class="fa-solid fa-shirt"></i></span>
                                <span class="attr-prod-name">Casual Cotton Shirt</span>
                            </div>
                        </td>
                        <td data-label="Variant Combination">
                            <div class="attr-variant-combo">
                                <span class="attr-variant-chip"><strong>Color:</strong> Red</span>
                                <span class="attr-variant-chip"><strong>Size:</strong> Large (L)</span>
                            </div>
                        </td>
                        <td data-label="Price"><span class="prod-price">$38.00</span></td>
                        <td data-label="Stock">
                            <span class="attr-stock attr-stock-low">15 in stock</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="attr-actions">
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editVariantModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteVariantModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr data-stock="in">
                        <td data-label="ID"><span class="order-id">V-503</span></td>
                        <td data-label="Product">
                            <div class="attr-prod-cell">
                                <span class="attr-prod-thumb"><i class="fa-solid fa-laptop"></i></span>
                                <span class="attr-prod-name">Ultra Slim Laptop 15"</span>
                            </div>
                        </td>
                        <td data-label="Variant Combination">
                            <div class="attr-variant-combo">
                                <span class="attr-variant-chip"><strong>Color:</strong> Black</span>
                                <span class="attr-variant-chip"><strong>RAM:</strong> 16GB</span>
                            </div>
                        </td>
                        <td data-label="Price"><span class="prod-price">$1,250.00</span></td>
                        <td data-label="Stock">
                            <span class="attr-stock attr-stock-in">12 in stock</span>
                        </td>
                        <td data-label="Actions" style="text-align:right;">
                            <div class="attr-actions">
                                <button class="btn-icon-action btn-edit" title="Edit" data-bs-toggle="modal"
                                    data-bs-target="#editVariantModal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn-icon-action btn-delete" title="Delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteVariantModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="attr-empty d-none" id="variantEmptyState">
                <i class="fa-solid fa-box-open"></i>
                <p class="mb-0">No variants found.</p>
            </div>
        </div>
    </div>

    <!-- ============ EDIT ATTRIBUTE MODAL ============ -->
    <div class="modal fade" id="editAttributeModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-pen-to-square me-2"></i> Edit Attribute
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editAttributeForm">
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Attribute Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="Color" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Attribute Values (comma separated)</label>
                            <input type="text" class="form-control" value="Red, Blue, Black, White">
                            <small class="text-muted" style="font-size:0.75rem;">Separate each value with a comma.</small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn-gradient" type="submit" form="editAttributeForm">
                        <i class="fa-solid fa-check me-1"></i> Update
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ DELETE ATTRIBUTE MODAL ============ -->
    <div class="modal fade" id="deleteAttributeModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="attr-delete-icon">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Delete Attribute?</h5>
                    <p class="text-muted small mb-4">
                        All associated values & variant mappings will be affected.
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

    <!-- ============ EDIT VARIANT MODAL ============ -->
    <div class="modal fade" id="editVariantModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-pen-to-square me-2"></i> Edit Product Variant
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editVariantForm">

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Product <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" required>
                                    <option value="3" selected>Casual Cotton Shirt</option>
                                    <option value="1">Wireless Pro Smartphone</option>
                                    <option value="2">Ultra Slim Laptop 15"</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Variant SKU</label>
                                <input type="text" class="form-control" value="CCS-BLU-MED">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Price ($) <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" value="35.00" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small">Stock Quantity</label>
                                <input type="number" class="form-control" value="50">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-primary">
                                <i class="fa-solid fa-network-wired me-1"></i> Variant Attribute Values
                            </label>
                            <div class="p-3 border rounded-3 bg-light">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-medium">Color</label>
                                        <select class="form-select form-select-sm">
                                            <option>Red</option>
                                            <option selected>Blue</option>
                                            <option>Black</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-medium">Size</label>
                                        <select class="form-select form-select-sm">
                                            <option>Small (S)</option>
                                            <option selected>Medium (M)</option>
                                            <option>Large (L)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn-gradient" type="submit" form="editVariantForm">
                        <i class="fa-solid fa-check me-1"></i> Update Variant
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ DELETE VARIANT MODAL ============ -->
    <div class="modal fade" id="deleteVariantModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div class="attr-delete-icon">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Delete Variant?</h5>
                    <p class="text-muted small mb-4">
                        This variant and its stock data will be permanently removed.
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
