@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header -->
    <div class="page-header reveal" style="flex-direction:column; align-items:flex-start; gap:0;">
        <div class="var-breadcrumb">
            <a href="dashboard.html">Dashboard</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="attributes.html">Attributes & Variants</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span class="text-dark fw-semibold">Create Variant</span>
        </div>
        <h1 class="page-title mt-2">Create Product Variant</h1>
        <p class="page-subtitle">Combine attribute values to define a specific SKU variant</p>
    </div>

    <!-- Info Box -->
    <div class="var-info-box reveal">
        <i class="fa-solid fa-circle-info"></i>
        <p>
            <strong>How it works:</strong> Select a base product, then add attribute combinations
            (e.g. <em>Color: Blue + Size: M</em>). Each combination creates a unique SKU
            with its own price and stock.
        </p>
    </div>

    <!-- Form -->
    <div class="reveal">
        <form id="createVariantForm" novalidate>
            <div class="var-form-grid">

                <!-- LEFT: Main -->
                <div>
                    <div class="admin-card">

                        <!-- Base Info -->
                        <h6 class="fw-bold mb-3" style="font-size:0.9rem;">
                            <i class="fa-solid fa-box text-primary me-1"></i> Base Product & SKU
                        </h6>

                        <div class="vf-group">
                            <label for="vfProduct">Select Product <span class="req">*</span></label>
                            <select id="vfProduct" class="vf-select" required>
                                <option value="">Choose a product...</option>
                                <option value="101">Wireless Pro Smartphone</option>
                                <option value="102">Ultra Slim Laptop 15"</option>
                                <option value="103" selected>Casual Cotton Shirt</option>
                                <option value="104">Bluetooth Speaker Mini</option>
                            </select>
                        </div>

                        <div class="vf-row">
                            <div class="vf-group">
                                <label for="vfSku">Variant SKU <span class="req">*</span></label>
                                <input type="text" id="vfSku" class="vf-input" placeholder="e.g. CCS-BLU-MED"
                                    required>
                                <small class="vf-hint">Unique code for this variant.</small>
                            </div>
                            <div class="vf-group">
                                <label for="vfStatus">Status</label>
                                <select id="vfStatus" class="vf-select">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Attribute Combinations -->
                        <h6 class="fw-bold mb-3 mt-4" style="font-size:0.9rem;">
                            <i class="fa-solid fa-layer-group text-primary me-1"></i> Attribute Combinations
                        </h6>

                        <div class="vf-group">
                            <label>Variant Attributes <span class="req">*</span></label>
                            <div class="vf-attrs-builder" id="vfAttrsBuilder">
                                <!-- Dynamic rows will be injected here -->
                            </div>
                            <button type="button" class="vf-add-attr-btn" id="vfAddAttrBtn">
                                <i class="fa-solid fa-plus me-1"></i> Add Another Attribute
                            </button>

                            <div class="vf-preview-card">
                                <span class="vf-preview-label">Combo:</span>
                                <span id="vfComboPreview" class="text-muted small">Fill attributes to preview…</span>
                            </div>
                        </div>

                        <!-- Pricing & Stock -->
                        <h6 class="fw-bold mb-3 mt-4" style="font-size:0.9rem;">
                            <i class="fa-solid fa-tag text-primary me-1"></i> Pricing & Stock
                        </h6>

                        <div class="vf-row">
                            <div class="vf-group">
                                <label for="vfPrice">Variant Price ($) <span class="req">*</span></label>
                                <input type="number" id="vfPrice" class="vf-input" placeholder="0.00" step="0.01"
                                    required>
                            </div>
                            <div class="vf-group">
                                <label for="vfCompare">Compare-at Price ($)</label>
                                <input type="number" id="vfCompare" class="vf-input" placeholder="0.00" step="0.01">
                                <small class="vf-hint">Optional — for showing discounts.</small>
                            </div>
                        </div>

                        <div class="vf-row">
                            <div class="vf-group">
                                <label for="vfStock">Stock Quantity</label>
                                <input type="number" id="vfStock" class="vf-input" placeholder="0" min="0">
                            </div>
                            <div class="vf-group">
                                <label for="vfWeight">Weight (kg)</label>
                                <input type="number" id="vfWeight" class="vf-input" placeholder="0.0" step="0.1">
                            </div>
                        </div>

                        <div class="vf-group" style="margin-bottom:0;">
                            <label for="vfNotes">Internal Notes</label>
                            <textarea id="vfNotes" class="vf-textarea" placeholder="Optional notes visible only to admins..."></textarea>
                        </div>

                    </div>
                </div>

                <!-- RIGHT: Side Panel -->
                <div>
                    <div class="vf-side-panel">

                        <h6><i class="fa-solid fa-image"></i> Variant Image</h6>

                        <div class="pf-upload" id="vfUploadBox"
                            style="border:2px dashed var(--border-color); border-radius:var(--radius-lg); padding:28px 16px; text-align:center; cursor:pointer; background:#fff; transition:var(--transition);">
                            <i class="fa-solid fa-cloud-arrow-up"
                                style="font-size:1.6rem; color:var(--primary); margin-bottom:8px; display:block;"></i>
                            <div style="font-size:0.84rem; font-weight:600; color:var(--text-dark); margin-bottom:4px;">
                                Click to upload</div>
                            <div style="font-size:0.72rem; color:var(--text-muted);">PNG, JPG — max 2 MB</div>
                            <input type="file" id="vfImageInput" accept="image/*" hidden>
                        </div>

                        <div id="vfUploadPreview" style="display:none; margin-top:14px; text-align:center;">
                            <img id="vfPreviewImg" src="" alt="Preview"
                                style="max-width:130px; border-radius:var(--radius-md); box-shadow:var(--shadow-md);">
                        </div>

                        <h6 style="margin-top:24px;"><i class="fa-solid fa-circle-check"></i> Quick Summary</h6>

                        <div style="font-size:0.8rem; color:var(--text-muted); line-height:1.8;">
                            <div class="d-flex justify-content-between">
                                <span>Product:</span>
                                <strong class="text-dark" id="vfSummaryProduct"
                                    style="text-align:right; max-width:60%;">—</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>SKU:</span>
                                <strong class="text-dark" id="vfSummarySku">—</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Combination:</span>
                                <strong class="text-dark" id="vfSummaryCombo"
                                    style="text-align:right; max-width:60%;">—</strong>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Actions -->
            <div class="admin-card" style="margin-top:24px;">
                <div class="vf-actions">
                    <a href="attributes.html" class="btn-soft-cancel">
                        <i class="fa-solid fa-xmark"></i> Cancel
                    </a>
                    <button type="submit" class="btn-gradient">
                        <i class="fa-solid fa-check me-1"></i> Save Variant
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
