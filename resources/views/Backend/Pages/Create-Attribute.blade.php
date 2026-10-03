@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header -->
    <div class="page-header reveal" style="flex-direction:column; align-items:flex-start; gap:0;">
        <div class="attr-breadcrumb">
            <a href="dashboard.html">Dashboard</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="attributes.html">Attributes & Variants</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span class="text-dark fw-semibold">Create Attribute</span>
        </div>
        <h1 class="page-title mt-2">Create Global Attribute</h1>
        <p class="page-subtitle">Define a reusable attribute and its values (e.g. Color → Red, Blue, Black)</p>
    </div>

    <!-- Info Box -->
    <div class="attr-info-box reveal">
        <i class="fa-solid fa-circle-info"></i>
        <p>
            <strong>Tip:</strong> An attribute is a global master like "Color" or "Size".
            Each attribute can have multiple <strong>values</strong>. You can later combine
            multiple attribute values to create <strong>product variants</strong>.
        </p>
    </div>

    <!-- Form -->
    <div class="reveal">
        <form id="createAttributeForm" novalidate>
            <div class="attr-form-grid">

                <!-- LEFT: Main -->
                <div>
                    <div class="admin-card">

                        <h6 class="fw-bold mb-3" style="font-size:0.9rem;">
                            <i class="fa-solid fa-tag text-primary me-1"></i> Attribute Information
                        </h6>

                        <div class="af-group">
                            <label for="attrName">Attribute Name <span class="req">*</span></label>
                            <input type="text" id="attrName" class="af-input"
                                placeholder="e.g. Material, Storage, Weight" required>
                            <small class="af-hint">Use a short, clear name — it appears in variant selectors.</small>
                        </div>

                        <div class="af-group">
                            <label>Attribute Values <span class="req">*</span></label>
                            <div class="af-values-builder" id="afValuesBuilder">
                                <input type="text" id="afValueInput" placeholder="Type a value and press Enter...">
                            </div>
                            <small class="af-hint">
                                Type a value and press <strong>Enter</strong> or <strong>comma</strong> to add. Press
                                Backspace to remove last.
                            </small>
                        </div>

                        <div class="af-group">
                            <label>Preview</label>
                            <div class="af-preview-tags" id="afPreviewTags">
                                <span class="text-muted">Values will appear here as you add them…</span>
                            </div>
                        </div>

                        <div class="af-group" style="margin-bottom:0;">
                            <label for="attrDesc">Description</label>
                            <textarea id="attrDesc" class="af-textarea" placeholder="Optional. What is this attribute used for?"></textarea>
                        </div>

                    </div>
                </div>

                <!-- RIGHT: Side Panel -->
                <div>
                    <div class="af-side-panel">

                        <h6><i class="fa-solid fa-image"></i> Icon (optional)</h6>

                        <div class="af-icon-grid" id="afIconGrid">
                            <div class="af-icon-option selected" data-icon="fa-solid fa-palette"><i
                                    class="fa-solid fa-palette"></i></div>
                            <div class="af-icon-option" data-icon="fa-solid fa-ruler"><i class="fa-solid fa-ruler"></i>
                            </div>
                            <div class="af-icon-option" data-icon="fa-solid fa-memory"><i class="fa-solid fa-memory"></i>
                            </div>
                            <div class="af-icon-option" data-icon="fa-solid fa-weight-scale"><i
                                    class="fa-solid fa-weight-scale"></i></div>
                            <div class="af-icon-option" data-icon="fa-solid fa-cube"><i class="fa-solid fa-cube"></i></div>
                            <div class="af-icon-option" data-icon="fa-solid fa-layer-group"><i
                                    class="fa-solid fa-layer-group"></i></div>
                            <div class="af-icon-option" data-icon="fa-solid fa-tag"><i class="fa-solid fa-tag"></i></div>
                            <div class="af-icon-option" data-icon="fa-solid fa-shirt"><i class="fa-solid fa-shirt"></i>
                            </div>
                            <div class="af-icon-option" data-icon="fa-solid fa-shoe-prints"><i
                                    class="fa-solid fa-shoe-prints"></i></div>
                            <div class="af-icon-option" data-icon="fa-solid fa-droplet"><i class="fa-solid fa-droplet"></i>
                            </div>
                            <div class="af-icon-option" data-icon="fa-solid fa-box"><i class="fa-solid fa-box"></i></div>
                            <div class="af-icon-option" data-icon="fa-solid fa-star"><i class="fa-solid fa-star"></i></div>
                        </div>

                        <h6 style="margin-top:24px;"><i class="fa-solid fa-toggle-on"></i> Status</h6>

                        <div class="af-group" style="margin-bottom:0;">
                            <label for="attrStatus">Visibility</label>
                            <select id="attrStatus" class="af-input">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Actions -->
            <div class="admin-card" style="margin-top:24px;">
                <div class="af-actions">
                    <a href="attributes.html" class="btn-soft-cancel">
                        <i class="fa-solid fa-xmark"></i> Cancel
                    </a>
                    <button type="submit" class="btn-gradient">
                        <i class="fa-solid fa-check me-1"></i> Save Attribute
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
