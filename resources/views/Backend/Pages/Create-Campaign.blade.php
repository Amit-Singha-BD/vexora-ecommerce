@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header -->
    <div class="page-header reveal" style="flex-direction:column; align-items:flex-start; gap:0;">
        <div class="co-breadcrumb">
            <a href="dashboard.html">Dashboard</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="offers.html">Offers & Campaigns</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span class="text-dark fw-semibold">Create New</span>
        </div>
        <h1 class="page-title mt-2">Create New Campaign</h1>
        <p class="page-subtitle">Set up a seasonal campaign or flash sale with a discount & banner</p>
    </div>

    <!-- Info Box -->
    <div class="co-info-box reveal">
        <i class="fa-solid fa-circle-info"></i>
        <p>
            <strong>Tip:</strong> After creating a campaign, you'll be able to
            <strong>map specific products</strong> and override their prices from
            the Campaign List page.
        </p>
    </div>

    <!-- Form -->
    <div class="reveal">
        <form id="createCampaignForm" novalidate>
            <div class="co-form-grid">

                <!-- LEFT: Main -->
                <div>
                    <div class="admin-card">

                        <h6 class="fw-bold mb-3" style="font-size:0.9rem;">
                            <i class="fa-solid fa-bullhorn text-primary me-1"></i> Campaign Information
                        </h6>

                        <div class="co-group">
                            <label for="coTitle">Campaign Title <span class="req">*</span></label>
                            <input type="text" id="coTitle" class="co-input" placeholder="e.g. Eid Mega Fest 2026"
                                required>
                        </div>

                        <div class="co-group">
                            <label for="coSlug">URL Slug</label>
                            <div class="co-slug-wrap">
                                <span class="prefix">/campaign/</span>
                                <input type="text" id="coSlug" class="co-input" placeholder="eid-mega-fest-2026">
                            </div>
                            <small class="co-hint">Auto-generated from title. Edit if needed.</small>
                        </div>

                        <div class="co-group" style="margin-bottom:0;">
                            <label for="coDesc">Description</label>
                            <textarea id="coDesc" class="co-textarea" placeholder="Brief description about this campaign..."></textarea>
                        </div>

                        <h6 class="fw-bold mb-3 mt-4" style="font-size:0.9rem;">
                            <i class="fa-solid fa-percent text-primary me-1"></i> Discount Configuration
                        </h6>

                        <div class="co-group">
                            <label>Discount Type <span class="req">*</span></label>
                            <div class="co-type-toggle">
                                <label class="co-type-option selected" data-type="percentage">
                                    <input type="radio" name="discountType" value="percentage" checked>
                                    <i class="fa-solid fa-percent"></i>
                                    <span class="type-name">Percentage</span>
                                    <span class="type-desc">e.g. 20% off</span>
                                </label>
                                <label class="co-type-option" data-type="fixed">
                                    <input type="radio" name="discountType" value="fixed">
                                    <i class="fa-solid fa-tag"></i>
                                    <span class="type-name">Fixed Amount</span>
                                    <span class="type-desc">e.g. ৳ 300 off</span>
                                </label>
                            </div>
                        </div>

                        <div class="co-row">
                            <div class="co-group">
                                <label for="coValue">Discount Value <span class="req">*</span></label>
                                <input type="number" id="coValue" class="co-input" placeholder="20" min="0"
                                    step="1" required>
                                <small class="co-hint" id="coValueHint">Enter percentage (1–100).</small>
                            </div>
                            <div class="co-group">
                                <label for="coMinSpend">Minimum Order Spend (৳)</label>
                                <input type="number" id="coMinSpend" class="co-input" placeholder="1000" min="0">
                                <small class="co-hint">Optional — order must exceed this.</small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-3 mt-4" style="font-size:0.9rem;">
                            <i class="fa-solid fa-calendar-days text-primary me-1"></i> Duration
                        </h6>

                        <div class="co-row">
                            <div class="co-group" style="margin-bottom:0;">
                                <label for="coStartDate">Start Date & Time <span class="req">*</span></label>
                                <input type="datetime-local" id="coStartDate" class="co-input" required>
                            </div>
                            <div class="co-group" style="margin-bottom:0;">
                                <label for="coEndDate">End Date & Time <span class="req">*</span></label>
                                <input type="datetime-local" id="coEndDate" class="co-input" required>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- RIGHT: Side Panel -->
                <div>
                    <div class="co-side-panel">

                        <h6><i class="fa-solid fa-eye"></i> Live Preview</h6>

                        <div class="co-preview-card">
                            <div class="co-preview-label">CAMPAIGN</div>
                            <div class="co-preview-title" id="coPreviewTitle">Eid Mega Fest 2026</div>
                            <div class="co-preview-discount" id="coPreviewDiscount">20% OFF</div>
                            <div class="co-preview-meta">
                                <div id="coPreviewMin">Min spend: ৳ 1,000</div>
                                <div id="coPreviewDates">01 Jun – 15 Jun 2026</div>
                            </div>
                        </div>

                        <h6 style="margin-top:24px;"><i class="fa-solid fa-image"></i> Banner Image</h6>

                        <div class="co-banner-upload" id="coBannerBox">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <div class="title">Click to upload banner</div>
                            <div class="sub">Recommended 1200×400 px — max 3 MB</div>
                            <input type="file" id="coBannerInput" accept="image/*" hidden>
                        </div>
                        <div class="co-banner-preview" id="coBannerPreview">
                            <img src="" alt="Banner Preview" id="coBannerImg">
                        </div>

                        <h6 style="margin-top:24px;"><i class="fa-solid fa-toggle-on"></i> Status</h6>

                        <div class="co-group" style="margin-bottom:0;">
                            <label for="coStatus">Publish As</label>
                            <select id="coStatus" class="co-select">
                                <option value="active" selected>Active — Visible to all</option>
                                <option value="scheduled">Scheduled — Activate at start date</option>
                                <option value="inactive">Inactive — Draft</option>
                            </select>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Actions -->
            <div class="admin-card" style="margin-top:24px;">
                <div class="co-actions">
                    <a href="offers.html" class="btn-soft-cancel">
                        <i class="fa-solid fa-xmark"></i> Cancel
                    </a>
                    <button type="submit" class="btn-gradient">
                        <i class="fa-solid fa-check me-1"></i> Save & Publish Campaign
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
