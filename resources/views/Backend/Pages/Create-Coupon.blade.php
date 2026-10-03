@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header -->
    <div class="page-header reveal" style="flex-direction:column; align-items:flex-start; gap:0;">
        <div class="cc-breadcrumb">
            <a href="dashboard.html">Dashboard</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="coupons.html">Coupons</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span class="text-dark fw-semibold">Create New</span>
        </div>
        <h1 class="page-title mt-2">Create New Coupon</h1>
        <p class="page-subtitle">Set up a new discount coupon with limits, validity and rules</p>
    </div>

    <!-- Info Box -->
    <div class="cc-info-box reveal">
        <i class="fa-solid fa-circle-info"></i>
        <p>
            <strong>Tip:</strong> Use a memorable coupon code (e.g. <code>EID2026</code>).
            Percentage coupons are best for broad offers, while fixed-amount coupons
            work well for loyalty or abandoned-cart recovery.
        </p>
    </div>

    <!-- Form -->
    <div class="reveal">
        <form id="createCouponForm" novalidate>
            <div class="cc-form-grid">

                <!-- LEFT: Main -->
                <div>
                    <div class="admin-card">

                        <h6 class="fw-bold mb-3" style="font-size:0.9rem;">
                            <i class="fa-solid fa-ticket text-primary me-1"></i> Coupon Identity
                        </h6>

                        <div class="cc-group">
                            <label for="ccCode">Coupon Code <span class="req">*</span></label>
                            <div class="cc-code-wrap">
                                <input type="text" id="ccCode" class="cc-input" placeholder="E.G. SUMMER50" required>
                                <button type="button" class="cc-code-generate" id="ccGenerateBtn">
                                    <i class="fa-solid fa-wand-magic-sparkles"></i> Generate
                                </button>
                            </div>
                            <small class="cc-hint">Use uppercase letters, numbers & hyphens only.</small>
                        </div>

                        <h6 class="fw-bold mb-3 mt-4" style="font-size:0.9rem;">
                            <i class="fa-solid fa-percent text-primary me-1"></i> Discount Configuration
                        </h6>

                        <div class="cc-group">
                            <label>Discount Type <span class="req">*</span></label>
                            <div class="cc-type-toggle">
                                <label class="cc-type-option selected" data-type="percentage">
                                    <input type="radio" name="discountType" value="percentage" checked>
                                    <i class="fa-solid fa-percent"></i>
                                    <span class="type-name">Percentage</span>
                                    <span class="type-desc">e.g. 15% off</span>
                                </label>
                                <label class="cc-type-option" data-type="fixed">
                                    <input type="radio" name="discountType" value="fixed">
                                    <i class="fa-solid fa-tag"></i>
                                    <span class="type-name">Fixed Amount</span>
                                    <span class="type-desc">e.g. ৳ 500 off</span>
                                </label>
                            </div>
                        </div>

                        <div class="cc-row">
                            <div class="cc-group">
                                <label for="ccValue">Discount Value <span class="req">*</span></label>
                                <input type="number" id="ccValue" class="cc-input" placeholder="15" min="0"
                                    step="1" required>
                                <small class="cc-hint" id="ccValueHint">Enter percentage (1–100).</small>
                            </div>
                            <div class="cc-group">
                                <label for="ccMinSpend">Minimum Order Spend (৳)</label>
                                <input type="number" id="ccMinSpend" class="cc-input" placeholder="1000" min="0">
                                <small class="cc-hint">Order total must exceed this to apply.</small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-3 mt-4" style="font-size:0.9rem;">
                            <i class="fa-solid fa-shield-halved text-primary me-1"></i> Usage Limits
                        </h6>

                        <div class="cc-row">
                            <div class="cc-group">
                                <label for="ccTotalLimit">Total Usage Limit</label>
                                <input type="number" id="ccTotalLimit" class="cc-input" placeholder="500" min="0">
                                <small class="cc-hint">Leave empty for unlimited.</small>
                            </div>
                            <div class="cc-group">
                                <label for="ccPerUser">Per-User Limit</label>
                                <input type="number" id="ccPerUser" class="cc-input" value="1" min="1">
                                <small class="cc-hint">How many times one user can use it.</small>
                            </div>
                        </div>

                        <h6 class="fw-bold mb-3 mt-4" style="font-size:0.9rem;">
                            <i class="fa-solid fa-calendar-days text-primary me-1"></i> Validity Period
                        </h6>

                        <div class="cc-row">
                            <div class="cc-group" style="margin-bottom:0;">
                                <label for="ccStartDate">Start Date <span class="req">*</span></label>
                                <input type="date" id="ccStartDate" class="cc-input" required>
                            </div>
                            <div class="cc-group" style="margin-bottom:0;">
                                <label for="ccExpiryDate">Expiry Date <span class="req">*</span></label>
                                <input type="date" id="ccExpiryDate" class="cc-input" required>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- RIGHT: Side Panel -->
                <div>
                    <div class="cc-side-panel">

                        <h6><i class="fa-solid fa-eye"></i> Live Preview</h6>

                        <div class="cc-preview-card">
                            <div class="cc-preview-label">DISCOUNT COUPON</div>
                            <div class="cc-preview-code" id="ccPreviewCode">COUPON</div>
                            <div class="cc-preview-discount" id="ccPreviewDiscount">15% OFF</div>
                            <div class="cc-preview-meta">
                                <div id="ccPreviewMin">Min spend: ৳ 1,000</div>
                                <div id="ccPreviewDates">Valid: 01 Jun – 15 Jun 2026</div>
                            </div>
                        </div>

                        <h6 style="margin-top:24px;"><i class="fa-solid fa-toggle-on"></i> Status</h6>

                        <div class="cc-group" style="margin-bottom:0;">
                            <label for="ccStatus">Publish As</label>
                            <select id="ccStatus" class="cc-select">
                                <option value="active" selected>Active — Visible to all</option>
                                <option value="scheduled">Scheduled — Only at start date</option>
                                <option value="inactive">Inactive — Hidden</option>
                            </select>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Actions -->
            <div class="admin-card" style="margin-top:24px;">
                <div class="cc-actions">
                    <a href="coupons.html" class="btn-soft-cancel">
                        <i class="fa-solid fa-xmark"></i> Cancel
                    </a>
                    <button type="submit" class="btn-gradient">
                        <i class="fa-solid fa-check me-1"></i> Save & Publish Coupon
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
