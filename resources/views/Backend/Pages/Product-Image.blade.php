@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header -->
    <div class="page-header reveal" style="flex-direction:column; align-items:flex-start; gap:0;">
        <div class="pimg-breadcrumb">
            <a href="dashboard.html">Dashboard</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="all-products.html">Products</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span class="text-dark fw-semibold">Image Manager</span>
        </div>
        <h1 class="page-title mt-2">Product Image Manager</h1>
        <p class="page-subtitle">Upload gallery images, set primary/thumbnail status & manage sort order</p>
    </div>

    <!-- Product Selector Bar -->
    <div class="pimg-selector-bar reveal">
        <div class="sel-icon"><i class="fa-solid fa-box-open"></i></div>
        <div class="sel-text">
            <small>Currently Managing</small>
            <strong id="pimgCurrentProduct">Wireless Pro Smartphone</strong>
        </div>
        <select class="pimg-product-select" id="pimgProductSelect">
            <option value="101" selected>Wireless Pro Smartphone (ID: 101)</option>
            <option value="102">Ultra Slim Laptop 15" (ID: 102)</option>
            <option value="103">Casual Cotton Shirt (ID: 103)</option>
            <option value="104">Bluetooth Speaker Mini (ID: 104)</option>
        </select>
    </div>

    <!-- SECTION 1: Upload Dropzone -->
    <div class="admin-card reveal">
        <div class="d-flex justify-content-between align-items-center mb-3" style="flex-wrap:wrap; gap:10px;">
            <h2 class="admin-card-title">
                <i class="fa-solid fa-cloud-arrow-up"></i> Upload New Images
            </h2>
            <span class="pimg-count-badge">
                <i class="fa-solid fa-images"></i> 3 images
            </span>
        </div>

        <div class="pimg-dropzone" id="pimgDropzone">
            <div class="dz-icon"><i class="fa-solid fa-file-arrow-up"></i></div>
            <h6>Drag & Drop product images here</h6>
            <p>Supports JPG, PNG, WEBP — up to 5 MB per file</p>
            <button type="button" class="btn-gradient" id="pimgBrowseBtn">
                <i class="fa-solid fa-folder-open me-1"></i> Browse Files
            </button>
            <input type="file" id="pimgFileInput" accept="image/*" multiple hidden>

            <!-- Uploaded chips -->
            <div class="pimg-file-chips" id="pimgFileChips"></div>
        </div>
    </div>

    <!-- SECTION 2: Image Gallery -->
    <div class="admin-card reveal">
        <div class="admin-card-header">
            <h2 class="admin-card-title">
                <i class="fa-solid fa-photo-film"></i>
                Gallery Images for
                <span class="text-primary" id="pimgGalleryProductName">Wireless Pro Smartphone</span>
            </h2>
            <button class="btn-gradient" id="pimgSaveBtn">
                <i class="fa-solid fa-floppy-disk me-1"></i> Save Changes
            </button>
        </div>

        <p class="text-muted small mb-3">
            <i class="fa-solid fa-circle-info me-1"></i>
            Select a radio to make an image <strong>Primary</strong>. Adjust sort order to control display sequence.
        </p>

        <!-- Gallery grid -->
        <div class="pimg-gallery" id="pimgGallery">

            <!-- Image 1: Primary -->
            <div class="pimg-card is-primary" data-img-id="1">
                <span class="pimg-primary-badge">
                    <i class="fa-solid fa-star"></i> Primary
                </span>
                <div class="pimg-thumb"><i class="fa-solid fa-mobile-screen"></i></div>

                <div class="pimg-card-actions">
                    <label class="pimg-radio-label active">
                        <input type="radio" name="primaryImg" value="1" checked>
                        <span>Set Primary</span>
                    </label>
                    <button class="pimg-delete-btn" title="Delete image">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>

                <div class="pimg-sort-row">
                    <span class="sort-label">Sort</span>
                    <input type="number" value="1" min="1">
                </div>
            </div>

            <!-- Image 2 -->
            <div class="pimg-card" data-img-id="2">
                <div class="pimg-thumb"><i class="fa-solid fa-mobile-retro"></i></div>

                <div class="pimg-card-actions">
                    <label class="pimg-radio-label">
                        <input type="radio" name="primaryImg" value="2">
                        <span>Set Primary</span>
                    </label>
                    <button class="pimg-delete-btn" title="Delete image">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>

                <div class="pimg-sort-row">
                    <span class="sort-label">Sort</span>
                    <input type="number" value="2" min="1">
                </div>
            </div>

            <!-- Image 3 -->
            <div class="pimg-card" data-img-id="3">
                <div class="pimg-thumb"><i class="fa-solid fa-camera-rotate"></i></div>

                <div class="pimg-card-actions">
                    <label class="pimg-radio-label">
                        <input type="radio" name="primaryImg" value="3">
                        <span>Set Primary</span>
                    </label>
                    <button class="pimg-delete-btn" title="Delete image">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>

                <div class="pimg-sort-row">
                    <span class="sort-label">Sort</span>
                    <input type="number" value="3" min="1">
                </div>
            </div>

        </div>

        <!-- Empty state (hidden by default) -->
        <div class="pimg-empty d-none" id="pimgEmptyState">
            <i class="fa-solid fa-image"></i>
            <p class="mb-0">No images yet. Upload your first product image above.</p>
        </div>
    </div>
@endsection
