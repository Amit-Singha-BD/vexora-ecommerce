@extends('Backend.Layout.MasterLayout')
@section('Content')
    <!-- Page Header -->
    <div class="page-header reveal">
        <div>
            <h1 class="page-title">System Settings</h1>
            <p class="page-subtitle">Manage site info, delivery, gateways & global configurations</p>
        </div>
    </div>

    <!-- Info Box -->
    <div class="set-info-box reveal">
        <i class="fa-solid fa-circle-info"></i>
        <p>
            <strong>Tip:</strong> Changes take effect immediately after saving.
            Some settings (like Maintenance Mode) may affect the live store.
            Double-check before saving.
        </p>
    </div>

    <!-- Settings Layout -->
    <div class="set-layout reveal">

        <!-- ============ TABS SIDEBAR ============ -->
        <div class="set-tabs">
            <span class="set-tabs-label">Sections</span>

            <button class="set-tab-btn active" data-tab="basic">
                <i class="fa-solid fa-globe"></i> Basic Information
            </button>

            <button class="set-tab-btn" data-tab="delivery">
                <i class="fa-solid fa-truck-fast"></i> Delivery Charges
            </button>

            <button class="set-tab-btn" data-tab="global">
                <i class="fa-solid fa-sliders"></i> Global Config
            </button>

            <button class="set-tab-btn" data-tab="gateways">
                <i class="fa-solid fa-wallet"></i> Payment Gateways
            </button>

            <button class="set-tab-btn" data-tab="seo">
                <i class="fa-solid fa-magnifying-glass"></i> SEO & Meta
            </button>
        </div>

        <!-- ============ PANELS ============ -->
        <div>

            <!-- ========== PANEL: Basic Information ========== -->
            <div class="set-panel active" id="panel-basic">
                <div class="set-panel-head">
                    <div class="set-panel-icon"><i class="fa-solid fa-globe"></i></div>
                    <div>
                        <h2 class="set-panel-title">Site Basic Information</h2>
                        <p class="set-panel-sub">General brand & contact details shown to customers</p>
                    </div>
                </div>

                <form id="form-basic">
                    <div class="set-grid">
                        <div class="set-group">
                            <label>Site Name <span class="req">*</span></label>
                            <input type="text" class="set-input" value="E-Shop BD" required>
                        </div>
                        <div class="set-group">
                            <label>Site Tagline</label>
                            <input type="text" class="set-input" value="Your Trusted Online Marketplace">
                        </div>
                        <div class="set-group">
                            <label>Support Email <span class="req">*</span></label>
                            <input type="email" class="set-input" value="support@eshopbd.com" required>
                        </div>
                        <div class="set-group">
                            <label>Hotline / Phone</label>
                            <input type="text" class="set-input" value="+880 9612-345678">
                        </div>
                    </div>

                    <div class="set-group">
                        <label>Official Office Address</label>
                        <textarea class="set-textarea" rows="2">House 45, Road 12, Banani, Dhaka-1213, Bangladesh</textarea>
                    </div>

                    <div class="set-grid">
                        <div class="set-group">
                            <label>Site Logo</label>
                            <div class="set-upload">
                                <div class="up-icon"><i class="fa-solid fa-image"></i></div>
                                <div class="up-body">
                                    <p class="up-title">Upload Logo</p>
                                    <p class="up-sub">PNG / SVG — max 1 MB</p>
                                </div>
                                <input type="file" accept="image/*" hidden>
                            </div>
                        </div>

                        <div class="set-group">
                            <label>Favicon</label>
                            <div class="set-upload">
                                <div class="up-icon"><i class="fa-solid fa-star"></i></div>
                                <div class="up-body">
                                    <p class="up-title">Upload Favicon</p>
                                    <p class="up-sub">32×32 ICO / PNG</p>
                                </div>
                                <input type="file" accept="image/*" hidden>
                            </div>
                        </div>
                    </div>

                    <div class="set-actions">
                        <button type="button" class="btn-soft">
                            <i class="fa-solid fa-rotate-left"></i> Reset
                        </button>
                        <button type="submit" class="btn-gradient">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Save Basic Settings
                        </button>
                    </div>
                </form>
            </div>

            <!-- ========== PANEL: Delivery Charges ========== -->
            <div class="set-panel" id="panel-delivery">
                <div class="set-panel-head">
                    <div class="set-panel-icon"><i class="fa-solid fa-truck-fast"></i></div>
                    <div>
                        <h2 class="set-panel-title">Delivery Charges</h2>
                        <p class="set-panel-sub">Default shipping fees & courier configuration</p>
                    </div>
                </div>

                <form id="form-delivery">
                    <div class="set-grid">
                        <div class="set-group">
                            <label>Inside Dhaka Delivery (৳)</label>
                            <div class="set-input-group">
                                <span class="prefix">৳</span>
                                <input type="number" value="60" min="0">
                            </div>
                            <small class="set-hint">Applies to all Dhaka city zones.</small>
                        </div>

                        <div class="set-group">
                            <label>Outside Dhaka Delivery (৳)</label>
                            <div class="set-input-group">
                                <span class="prefix">৳</span>
                                <input type="number" value="120" min="0">
                            </div>
                            <small class="set-hint">Applies to all other districts.</small>
                        </div>

                        <div class="set-group">
                            <label>Express / Same Day Extra (৳)</label>
                            <div class="set-input-group">
                                <span class="prefix">৳</span>
                                <input type="number" value="100" min="0">
                            </div>
                            <small class="set-hint">Additional charge on top of base fee.</small>
                        </div>

                        <div class="set-group">
                            <label>Free Delivery Above (৳)</label>
                            <div class="set-input-group">
                                <span class="prefix">৳</span>
                                <input type="number" value="5000" min="0">
                            </div>
                            <small class="set-hint">Order total for free shipping.</small>
                        </div>
                    </div>

                    <div class="set-group">
                        <label>Default Courier Partner</label>
                        <select class="set-select">
                            <option selected>Steadfast Courier</option>
                            <option>Pathao Courier</option>
                            <option>RedX</option>
                            <option>Local Delivery System</option>
                            <option>Sundarban Courier</option>
                        </select>
                    </div>

                    <div class="set-info-box warn">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <p>
                            Changing delivery charges does not affect orders already placed.
                            Only new checkouts will use the new values.
                        </p>
                    </div>

                    <div class="set-actions">
                        <button type="button" class="btn-soft">
                            <i class="fa-solid fa-rotate-left"></i> Reset
                        </button>
                        <button type="submit" class="btn-gradient">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Update Charges
                        </button>
                    </div>
                </form>
            </div>

            <!-- ========== PANEL: Global Config ========== -->
            <div class="set-panel" id="panel-global">
                <div class="set-panel-head">
                    <div class="set-panel-icon"><i class="fa-solid fa-sliders"></i></div>
                    <div>
                        <h2 class="set-panel-title">Global Configurations</h2>
                        <p class="set-panel-sub">System-wide toggles & regional settings</p>
                    </div>
                </div>

                <form id="form-global">
                    <div class="set-grid">
                        <div class="set-group">
                            <label>Default Currency</label>
                            <select class="set-select">
                                <option value="BDT" selected>BDT (৳) — Bangladeshi Taka</option>
                                <option value="USD">USD ($) — US Dollar</option>
                                <option value="INR">INR (₹) — Indian Rupee</option>
                            </select>
                        </div>
                        <div class="set-group">
                            <label>Timezone</label>
                            <select class="set-select">
                                <option selected>(GMT+06:00) Dhaka, Bangladesh</option>
                                <option>(GMT+05:30) Kolkata, India</option>
                                <option>(GMT+00:00) UTC / London</option>
                            </select>
                        </div>
                    </div>

                    <!-- Toggles -->
                    <div class="set-group">
                        <label>Feature Toggles</label>

                        <div class="set-toggle">
                            <div class="set-toggle-body">
                                <p class="set-toggle-title">Maintenance Mode</p>
                                <p class="set-toggle-sub">
                                    When enabled, the customer-facing store will display a maintenance page.
                                </p>
                            </div>
                            <label class="set-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="set-toggle">
                            <div class="set-toggle-body">
                                <p class="set-toggle-title">New User Registration</p>
                                <p class="set-toggle-sub">
                                    Allow new customers to create accounts from the storefront.
                                </p>
                            </div>
                            <label class="set-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="set-toggle">
                            <div class="set-toggle-body">
                                <p class="set-toggle-title">Cash on Delivery (COD)</p>
                                <p class="set-toggle-sub">
                                    Enable COD as a payment method at checkout.
                                </p>
                            </div>
                            <label class="set-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="set-toggle">
                            <div class="set-toggle-body">
                                <p class="set-toggle-title">Product Reviews</p>
                                <p class="set-toggle-sub">
                                    Allow customers to leave reviews on products.
                                </p>
                            </div>
                            <label class="set-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>

                    <div class="set-actions">
                        <button type="button" class="btn-soft">
                            <i class="fa-solid fa-rotate-left"></i> Reset
                        </button>
                        <button type="submit" class="btn-gradient">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Save Configurations
                        </button>
                    </div>
                </form>
            </div>

            <!-- ========== PANEL: Payment Gateways ========== -->
            <div class="set-panel" id="panel-gateways">
                <div class="set-panel-head">
                    <div class="set-panel-icon"><i class="fa-solid fa-wallet"></i></div>
                    <div>
                        <h2 class="set-panel-title">Payment Gateways</h2>
                        <p class="set-panel-sub">Configure API credentials & enable/disable gateways</p>
                    </div>
                </div>

                <form id="form-gateways">

                    <!-- bKash -->
                    <div class="set-gateway enabled">
                        <div class="set-gateway-head">
                            <div class="set-gateway-title">
                                <span class="set-gateway-logo bkash">
                                    <i class="fa-solid fa-mobile-screen"></i>
                                </span>
                                <span>
                                    bKash Merchant
                                    <span class="set-gateway-status on">Enabled</span>
                                </span>
                            </div>
                            <label class="set-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="set-grid">
                            <div class="set-group" style="margin-bottom:0;">
                                <label>App Key</label>
                                <input type="text" class="set-input" value="bk_app_key_92830192"
                                    placeholder="Enter app key">
                            </div>
                            <div class="set-group" style="margin-bottom:0;">
                                <label>App Secret</label>
                                <input type="password" class="set-input" value="secret_key_placeholder"
                                    placeholder="Enter app secret">
                            </div>
                        </div>
                    </div>

                    <!-- SSLCommerz -->
                    <div class="set-gateway enabled">
                        <div class="set-gateway-head">
                            <div class="set-gateway-title">
                                <span class="set-gateway-logo ssl">
                                    <i class="fa-solid fa-credit-card"></i>
                                </span>
                                <span>
                                    SSLCommerz
                                    <span class="set-gateway-status on">Enabled</span>
                                </span>
                            </div>
                            <label class="set-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="set-grid">
                            <div class="set-group" style="margin-bottom:0;">
                                <label>Store ID</label>
                                <input type="text" class="set-input" value="eshopbdlive"
                                    placeholder="Enter store id">
                            </div>
                            <div class="set-group" style="margin-bottom:0;">
                                <label>Store Password</label>
                                <input type="password" class="set-input" value="store_pass_placeholder"
                                    placeholder="Enter store password">
                            </div>
                        </div>
                    </div>

                    <!-- Nagad -->
                    <div class="set-gateway">
                        <div class="set-gateway-head">
                            <div class="set-gateway-title">
                                <span class="set-gateway-logo cod">
                                    <i class="fa-solid fa-wallet"></i>
                                </span>
                                <span>
                                    Nagad Merchant
                                    <span class="set-gateway-status off">Disabled</span>
                                </span>
                            </div>
                            <label class="set-switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="set-grid">
                            <div class="set-group" style="margin-bottom:0;">
                                <label>Merchant ID</label>
                                <input type="text" class="set-input" placeholder="Enter merchant id">
                            </div>
                            <div class="set-group" style="margin-bottom:0;">
                                <label>Merchant Key</label>
                                <input type="password" class="set-input" placeholder="Enter merchant key">
                            </div>
                        </div>
                    </div>

                    <!-- COD -->
                    <div class="set-gateway enabled">
                        <div class="set-gateway-head">
                            <div class="set-gateway-title">
                                <span class="set-gateway-logo cod">
                                    <i class="fa-solid fa-truck"></i>
                                </span>
                                <span>
                                    Cash on Delivery
                                    <span class="set-gateway-status on">Enabled</span>
                                </span>
                            </div>
                            <label class="set-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="set-grid">
                            <div class="set-group" style="margin-bottom:0;">
                                <label>Max COD Order Amount (৳)</label>
                                <div class="set-input-group">
                                    <span class="prefix">৳</span>
                                    <input type="number" value="20000">
                                </div>
                            </div>
                            <div class="set-group" style="margin-bottom:0;">
                                <label>Advance Payment for COD (৳)</label>
                                <div class="set-input-group">
                                    <span class="prefix">৳</span>
                                    <input type="number" value="100">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="set-actions">
                        <button type="button" class="btn-soft">
                            <i class="fa-solid fa-rotate-left"></i> Reset
                        </button>
                        <button type="submit" class="btn-gradient">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Save Payment Settings
                        </button>
                    </div>
                </form>
            </div>

            <!-- ========== PANEL: SEO ========== -->
            <div class="set-panel" id="panel-seo">
                <div class="set-panel-head">
                    <div class="set-panel-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                    <div>
                        <h2 class="set-panel-title">SEO & Meta Tags</h2>
                        <p class="set-panel-sub">Improve your site's visibility on search engines</p>
                    </div>
                </div>

                <form id="form-seo">
                    <div class="set-group">
                        <label>Meta Title <span class="req">*</span></label>
                        <input type="text" class="set-input"
                            value="E-Shop BD - Best Online Shopping Platform in Bangladesh" maxlength="70">
                        <small class="set-hint">
                            Recommended: 50–60 characters. This appears as the blue link in Google.
                        </small>
                    </div>

                    <div class="set-group">
                        <label>Meta Keywords</label>
                        <input type="text" class="set-input"
                            value="ecommerce, online shopping, buy clothes, electronics bd, bkash payment">
                        <small class="set-hint">
                            Comma separated. Less important for modern SEO but harmless.
                        </small>
                    </div>

                    <div class="set-group">
                        <label>Meta Description</label>
                        <textarea class="set-textarea" rows="3" maxlength="160">Discover the best fashion, electronics, and lifestyle products with fast delivery across Bangladesh. Secure checkout with bKash and Cash on Delivery.</textarea>
                        <small class="set-hint">
                            Recommended: 150–160 characters. Shows as the snippet under your link.
                        </small>
                    </div>

                    <div class="set-group">
                        <label>Search Engine Visibility</label>
                        <div class="set-toggle">
                            <div class="set-toggle-body">
                                <p class="set-toggle-title">Index this site on Google</p>
                                <p class="set-toggle-sub">
                                    Turn off to hide from search engines (useful during development).
                                </p>
                            </div>
                            <label class="set-switch">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>

                    <div class="set-actions">
                        <button type="button" class="btn-soft">
                            <i class="fa-solid fa-rotate-left"></i> Reset
                        </button>
                        <button type="submit" class="btn-gradient">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Save SEO Settings
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
