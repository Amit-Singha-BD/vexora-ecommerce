@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header with Breadcrumb -->
    <div class="page-header reveal" style="flex-direction:column; align-items:flex-start; gap:0;">
        <div class="cat-breadcrumb">
            <a href="dashboard.html">Dashboard</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="categories.html">Categories</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span class="text-dark fw-semibold">Create New</span>
        </div>
        <h1 class="page-title mt-2">Create New Category</h1>
        <p class="page-subtitle">Add a new parent or child category to your store</p>
    </div>

    <!-- Info Box -->
    <div class="cat-info-box reveal">
        <i class="fa-solid fa-circle-info"></i>
        <p>
            <strong>Tip:</strong> If you want to create a <strong>top-level category</strong>,
            leave the "Parent Category" field empty. To create a <strong>sub-category</strong>,
            select its parent from the dropdown.
        </p>
    </div>

    <!-- Create Category Form Card -->
    <div class="admin-card reveal">
        <form id="createCategoryForm" novalidate>

            <!-- Row 1: Name + Slug -->
            <div class="cat-form-row">
                <div class="cat-form-group">
                    <label for="catName">Category Name <span class="req">*</span></label>
                    <input type="text" id="catName" class="cat-input" placeholder="e.g. Home Appliances" required>
                    <small class="cat-form-hint">Choose a clear, descriptive name.</small>
                </div>

                <div class="cat-form-group">
                    <label for="catSlug">URL Slug</label>
                    <div class="cat-slug-input-wrap">
                        <span class="prefix">/category/</span>
                        <input type="text" id="catSlug" class="cat-input" placeholder="home-appliances">
                    </div>
                    <small class="cat-form-hint">Auto-generated from name. Edit if needed.</small>
                </div>
            </div>

            <!-- Row 2: Parent + Status -->
            <div class="cat-form-row">
                <div class="cat-form-group">
                    <label for="catParent">Parent Category</label>
                    <select id="catParent" class="cat-select">
                        <option value="">— None (Top Level Parent) —</option>
                        <option value="1">Electronics</option>
                        <option value="4">Men's Fashion</option>
                        <option value="6">Women's Fashion</option>
                        <option value="7">Home & Kitchen</option>
                    </select>
                    <small class="cat-form-hint">Leave empty to create a parent category.</small>
                </div>

                <div class="cat-form-group">
                    <label for="catStatus">Status <span class="req">*</span></label>
                    <select id="catStatus" class="cat-select" required>
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <small class="cat-form-hint">Inactive categories won't show on the store.</small>
                </div>
            </div>

            <!-- Row 3: Description -->
            <div class="cat-form-group">
                <label for="catDesc">Description</label>
                <textarea id="catDesc" class="cat-textarea" placeholder="Brief description of this category..."></textarea>
                <small class="cat-form-hint">Optional. Helps with SEO and clarity.</small>
            </div>

            <!-- Row 4: Image Upload -->
            <div class="cat-form-group">
                <label>Category Image</label>
                <div class="cat-upload-box" id="catUploadBox">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <div class="upload-title">Click to upload image</div>
                    <div class="upload-sub">PNG, JPG, or WEBP — Max 2 MB</div>
                    <input type="file" id="catImageInput" accept="image/*" hidden>
                </div>
                <div class="cat-upload-preview" id="catUploadPreview">
                    <img src="" alt="Preview" id="catPreviewImg">
                </div>
            </div>

            <!-- Actions -->
            <div class="cat-form-actions">
                <a href="categories.html" class="btn-soft-cancel">
                    <i class="fa-solid fa-xmark"></i> Cancel
                </a>
                <button type="submit" class="btn-gradient">
                    <i class="fa-solid fa-check me-1"></i> Save Category
                </button>
            </div>
        </form>
    </div>
@endsection
