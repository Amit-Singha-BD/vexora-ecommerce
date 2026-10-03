@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header -->
    <div class="page-header reveal" style="flex-direction:column; align-items:flex-start; gap:0;">
        <div class="prod-breadcrumb">
            <a href="dashboard.html">Dashboard</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="all-products.html">Products</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span class="text-dark fw-semibold">Create New</span>
        </div>
        <h1 class="page-title mt-2">Create New Product</h1>
        <p class="page-subtitle">Fill in the product details, pricing, stock and assign categories</p>
    </div>

    <!-- Info Box -->
    <div class="pf-info-box reveal">
        <i class="fa-solid fa-circle-info"></i>
        <p>
            <strong>Tip:</strong> A product can be assigned to <strong>multiple categories</strong>
            (many-to-many). Fields marked with <span class="text-danger">*</span> are required.
        </p>
    </div>

    <!-- Form -->
    <div class="reveal">
        <form id="createProductForm" novalidate>
            <div class="prod-form-grid">

                <!-- LEFT: Main Details -->
                <div class="form-col">
                    <div class="admin-card">

                        <!-- Basic Info -->
                        <h6 class="fw-bold mb-3" style="font-size:0.9rem;">
                            <i class="fa-solid fa-circle-info text-primary me-1"></i> Basic Information
                        </h6>

                        <div class="pf-group">
                            <label for="pName">Product Name <span class="req">*</span></label>
                            <input type="text" id="pName" class="pf-input" placeholder="e.g. Wireless Gaming Mouse"
                                required>
                        </div>

                        <div class="pf-row">
                            <div class="pf-group">
                                <label for="pSku">SKU Code</label>
                                <input type="text" id="pSku" class="pf-input" placeholder="e.g. WGM-551">
                            </div>
                            <div class="pf-group">
                                <label for="pSlug">URL Slug</label>
                                <input type="text" id="pSlug" class="pf-input" placeholder="wireless-gaming-mouse">
                                <small class="pf-hint">Auto-generated from name.</small>
                            </div>
                        </div>

                        <div class="pf-group">
                            <label for="pDesc">Product Description</label>
                            <textarea id="pDesc" class="pf-textarea" placeholder="Enter detailed product specs and description..."></textarea>
                        </div>

                        <!-- Pricing & Stock -->
                        <h6 class="fw-bold mb-3 mt-4" style="font-size:0.9rem;">
                            <i class="fa-solid fa-tag text-primary me-1"></i> Pricing & Stock
                        </h6>

                        <div class="pf-row">
                            <div class="pf-group">
                                <label for="pPrice">Regular Price ($) <span class="req">*</span></label>
                                <input type="number" id="pPrice" class="pf-input" placeholder="0.00" step="0.01"
                                    required>
                            </div>
                            <div class="pf-group">
                                <label for="pDiscount">Discount Price ($)</label>
                                <input type="number" id="pDiscount" class="pf-input" placeholder="0.00" step="0.01">
                                <small class="pf-hint">Optional — leave empty if no discount.</small>
                            </div>
                        </div>

                        <div class="pf-row">
                            <div class="pf-group">
                                <label for="pStock">Stock Quantity</label>
                                <input type="number" id="pStock" class="pf-input" placeholder="0" min="0">
                            </div>
                            <div class="pf-group">
                                <label for="pLowStock">Low Stock Alert</label>
                                <input type="number" id="pLowStock" class="pf-input" placeholder="5" min="0"
                                    value="5">
                                <small class="pf-hint">Alert when stock drops below this.</small>
                            </div>
                        </div>

                        <!-- Categories -->
                        <h6 class="fw-bold mb-3 mt-4" style="font-size:0.9rem;">
                            <i class="fa-solid fa-network-wired text-primary me-1"></i> Assign Categories
                        </h6>

                        <div class="pf-group">
                            <label>Select Categories (multiple allowed)</label>
                            <div class="pf-cat-panel">
                                <label class="pf-cat-check">
                                    <input type="checkbox" value="1">
                                    <span>Electronics</span>
                                </label>
                                <label class="pf-cat-check">
                                    <input type="checkbox" value="2">
                                    <span>Smartphones</span>
                                </label>
                                <label class="pf-cat-check">
                                    <input type="checkbox" value="3">
                                    <span>Laptops & PCs</span>
                                </label>
                                <label class="pf-cat-check">
                                    <input type="checkbox" value="4">
                                    <span>Men's Fashion</span>
                                </label>
                                <label class="pf-cat-check">
                                    <input type="checkbox" value="5">
                                    <span>Casual Shirts</span>
                                </label>
                                <label class="pf-cat-check">
                                    <input type="checkbox" value="6">
                                    <span>Gadgets & Accessories</span>
                                </label>
                                <label class="pf-cat-check">
                                    <input type="checkbox" value="7">
                                    <span>Home & Kitchen</span>
                                </label>
                                <label class="pf-cat-check">
                                    <input type="checkbox" value="8">
                                    <span>Women's Fashion</span>
                                </label>
                            </div>
                            <small class="pf-hint">A product can belong to multiple categories.</small>
                        </div>

                    </div>
                </div>

                <!-- RIGHT: Side Panel -->
                <div class="form-col">
                    <div class="pf-side-panel">

                        <h6><i class="fa-solid fa-toggle-on"></i> Publish</h6>

                        <div class="pf-group">
                            <label for="pStatus">Product Status</label>
                            <select id="pStatus" class="pf-select">
                                <option value="active" selected>Active</option>
                                <option value="draft">Draft</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="pf-group">
                            <label for="pFeatured">Featured</label>
                            <select id="pFeatured" class="pf-select">
                                <option value="no" selected>No</option>
                                <option value="yes">Yes — Show on homepage</option>
                            </select>
                        </div>

                        <h6 style="margin-top:24px;"><i class="fa-solid fa-image"></i> Product Image</h6>

                        <div class="pf-upload" id="pUploadBox">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <div class="title">Click to upload</div>
                            <div class="sub">PNG, JPG, WEBP — Max 2 MB</div>
                            <input type="file" id="pImageInput" accept="image/*" hidden>
                        </div>
                        <div class="pf-upload-preview" id="pUploadPreview">
                            <img src="" alt="Preview" id="pPreviewImg">
                        </div>

                    </div>
                </div>

            </div>

            <!-- Actions -->
            <div class="admin-card" style="margin-top:24px;">
                <div class="pf-actions" style="border:none; padding-top:0; margin-top:0;">
                    <a href="all-products.html" class="btn-soft-cancel">
                        <i class="fa-solid fa-xmark"></i> Cancel
                    </a>
                    <button type="submit" class="btn-gradient">
                        <i class="fa-solid fa-check me-1"></i> Save Product
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
