/* ============================================================
   ADMIN PANEL — MAIN SCRIPT
   Sections:
     1. Core UI (Sidebar, Dropdown, Scroll Reveal)
     2. Categories (List + Create)
     3. Products (List + Create)
     4. Product Images
     5. Attributes (List + Create)
     6. Variants (Create)
     7. Coupons (List + Create)
     8. Orders
     9. Payments
    10. Returns & Refunds
    11. Offers / Campaigns (List + Create)
    12. Customers
    13. Settings
   ============================================================ */


/* ============================================================
   1. CORE UI — SIDEBAR, DROPDOWN, SCROLL REVEAL
   ============================================================ */

/* ---------- 1.1 Sidebar Toggle (mobile) ---------- */
const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('adminSidebar');
const backdrop = document.getElementById('sidebarBackdrop');

function toggleSidebar() {
    sidebar.classList.toggle('open');
    backdrop.classList.toggle('active');
}
menuToggle.addEventListener('click', toggleSidebar);
backdrop.addEventListener('click', toggleSidebar);

/* ---------- 1.2 Smooth Dropdown ---------- */
document.querySelectorAll('.nav-dropdown-toggle').forEach(toggle => {
    toggle.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.dataset.dropdown;
        const submenu = document.getElementById(targetId);
        const isOpen = submenu.classList.contains('open');

        // Close other dropdowns
        document.querySelectorAll('.nav-submenu.open').forEach(m => {
            if (m.id !== targetId) {
                m.classList.remove('open');
                const parent = m.previousElementSibling;
                parent.setAttribute('aria-expanded', 'false');
            }
        });

        // Toggle current dropdown
        if (isOpen) {
            submenu.classList.remove('open');
            this.setAttribute('aria-expanded', 'false');
        } else {
            submenu.classList.add('open');
            this.setAttribute('aria-expanded', 'true');
        }
    });
});

/* ---------- 1.3 Scroll Reveal Animation ---------- */
const revealElements = document.querySelectorAll('.reveal');
const revealOnScroll = () => {
    const trigger = window.innerHeight - 60;
    revealElements.forEach(el => {
        if (el.getBoundingClientRect().top < trigger) {
            el.classList.add('active');
        }
    });
};
window.addEventListener('scroll', revealOnScroll);
window.addEventListener('load', revealOnScroll);
revealOnScroll();

/* ---------- 1.4 Auto-close Sidebar on Link Click (mobile) ---------- */
document.querySelectorAll('.admin-sidebar .nav-link:not(.nav-dropdown-toggle)')
    .forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 992 && sidebar.classList.contains('open')) {
                toggleSidebar();
            }
        });
    });


/* ============================================================
   2. CATEGORIES
   ============================================================ */

/* ---------- 2.1 Category List — Search & Filter ---------- */
(function initCategoriesList() {
    const searchInput = document.getElementById('catSearchInput');
    const typeFilter = document.getElementById('catTypeFilter');
    const tableBody = document.getElementById('catTableBody');
    const emptyState = document.getElementById('catEmptyState');

    if (!searchInput || !tableBody) return;

    function filterCategories() {
        const query = searchInput.value.toLowerCase().trim();
        const type = typeFilter.value;
        const rows = tableBody.querySelectorAll('tr');
        let visibleCount = 0;

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const rowType = row.dataset.type || '';
            const matchesSearch = text.includes(query);
            const matchesType = (type === 'all') || (rowType === type);

            if (matchesSearch && matchesType) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        emptyState.classList.toggle('d-none', visibleCount > 0);
    }

    searchInput.addEventListener('input', filterCategories);
    typeFilter.addEventListener('change', filterCategories);
})();

/* ---------- 2.2 Create Category — Slug, Upload, Submit ---------- */
(function initCreateCategoryPage() {
    const nameInput = document.getElementById('catName');
    const slugInput = document.getElementById('catSlug');
    const form = document.getElementById('createCategoryForm');
    const uploadBox = document.getElementById('catUploadBox');
    const fileInput = document.getElementById('catImageInput');
    const previewBox = document.getElementById('catUploadPreview');
    const previewImg = document.getElementById('catPreviewImg');

    if (!form) return;

    /* Auto-generate slug from name */
    let slugManuallyEdited = false;

    if (nameInput && slugInput) {
        nameInput.addEventListener('input', function () {
            if (!slugManuallyEdited) {
                slugInput.value = this.value
                    .toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
            }
        });

        slugInput.addEventListener('input', function () {
            slugManuallyEdited = this.value.length > 0;
        });
    }

    /* Image upload & preview */
    if (uploadBox && fileInput) {
        uploadBox.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (!file) return;

            if (file.size > 2 * 1024 * 1024) {
                alert('File size exceeds 2 MB. Please choose a smaller image.');
                this.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = e => {
                previewImg.src = e.target.result;
                previewBox.style.display = 'block';
                uploadBox.style.display = 'none';
            };
            reader.readAsDataURL(file);
        });
    }

    /* Form submit (demo) */
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        if (!nameInput.value.trim()) {
            nameInput.focus();
            nameInput.style.borderColor = 'var(--danger)';
            return;
        }

        alert('✅ Category "' + nameInput.value + '" created successfully!');
        window.location.href = 'categories.html';
    });
})();


/* ============================================================
   3. PRODUCTS
   ============================================================ */

/* ---------- 3.1 Product List — Search, Stock & Category Filter ---------- */
(function initProductsList() {
    const searchInput = document.getElementById('prodSearchInput');
    const stockFilter = document.getElementById('prodStockFilter');
    const categoryFilter = document.getElementById('prodCategoryFilter');
    const tableBody = document.getElementById('prodTableBody');
    const emptyState = document.getElementById('prodEmptyState');

    if (!searchInput || !tableBody) return;

    function filterProducts() {
        const query = searchInput.value.toLowerCase().trim();
        const stock = stockFilter.value;
        const category = categoryFilter.value;
        const rows = tableBody.querySelectorAll('tr');
        let visibleCount = 0;

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const rowStock = row.dataset.stock || '';
            const rowCats = (row.dataset.cats || '').toLowerCase();

            const matchesSearch = text.includes(query);
            const matchesStock = (stock === 'all') || (rowStock === stock);
            const matchesCategory = (category === 'all') ||
                                    rowCats.includes(category.toLowerCase());

            if (matchesSearch && matchesStock && matchesCategory) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        emptyState.classList.toggle('d-none', visibleCount > 0);
    }

    searchInput.addEventListener('input', filterProducts);
    stockFilter.addEventListener('change', filterProducts);
    categoryFilter.addEventListener('change', filterProducts);
})();

/* ---------- 3.2 Create Product — Slug, Upload, Submit ---------- */
(function initCreateProductPage() {
    const nameInput = document.getElementById('pName');
    const slugInput = document.getElementById('pSlug');
    const form = document.getElementById('createProductForm');
    const uploadBox = document.getElementById('pUploadBox');
    const fileInput = document.getElementById('pImageInput');
    const previewBox = document.getElementById('pUploadPreview');
    const previewImg = document.getElementById('pPreviewImg');

    if (!form) return;

    /* Auto-generate slug */
    let slugManuallyEdited = false;

    if (nameInput && slugInput) {
        nameInput.addEventListener('input', function () {
            if (!slugManuallyEdited) {
                slugInput.value = this.value
                    .toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
            }
        });
        slugInput.addEventListener('input', function () {
            slugManuallyEdited = this.value.length > 0;
        });
    }

    /* Image upload & preview */
    if (uploadBox && fileInput) {
        uploadBox.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (!file) return;

            if (file.size > 2 * 1024 * 1024) {
                alert('File size exceeds 2 MB. Please choose a smaller image.');
                this.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = e => {
                previewImg.src = e.target.result;
                previewBox.style.display = 'block';
                uploadBox.style.display = 'none';
            };
            reader.readAsDataURL(file);
        });
    }

    /* Submit */
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        if (!nameInput.value.trim()) {
            nameInput.focus();
            nameInput.style.borderColor = 'var(--danger)';
            return;
        }

        alert('✅ Product "' + nameInput.value + '" created successfully!');
        window.location.href = 'all-products.html';
    });
})();


/* ============================================================
   4. PRODUCT IMAGES — UPLOAD, PRIMARY, DELETE, SELECTOR
   ============================================================ */
(function initProductImagesPage() {
    const dropzone = document.getElementById('pimgDropzone');
    const fileInput = document.getElementById('pimgFileInput');
    const browseBtn = document.getElementById('pimgBrowseBtn');
    const fileChips = document.getElementById('pimgFileChips');
    const gallery = document.getElementById('pimgGallery');
    const emptyState = document.getElementById('pimgEmptyState');
    const saveBtn = document.getElementById('pimgSaveBtn');

    if (!dropzone) return;

    /* ---------- 4.1 File Upload: Browse + Drag & Drop ---------- */
    browseBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        fileInput.click();
    });

    dropzone.addEventListener('click', (e) => {
        if (e.target.closest('button')) return;
        fileInput.click();
    });

    fileInput.addEventListener('change', () => {
        renderFileChips(fileInput.files);
    });

    ['dragenter', 'dragover'].forEach(evt => {
        dropzone.addEventListener(evt, (e) => {
            e.preventDefault();
            dropzone.classList.add('dragover');
        });
    });

    ['dragleave', 'drop'].forEach(evt => {
        dropzone.addEventListener(evt, (e) => {
            e.preventDefault();
            dropzone.classList.remove('dragover');
        });
    });

    dropzone.addEventListener('drop', (e) => {
        const files = e.dataTransfer.files;
        if (files && files.length) {
            renderFileChips(files);
        }
    });

    function renderFileChips(files) {
        if (!files || !files.length) return;
        fileChips.innerHTML = '';

        Array.from(files).slice(0, 8).forEach(file => {
            const sizeKB = (file.size / 1024).toFixed(0);
            const sizeText = sizeKB > 1024
                ? (sizeKB / 1024).toFixed(1) + ' MB'
                : sizeKB + ' KB';

            const chip = document.createElement('span');
            chip.className = 'pimg-file-chip';
            chip.innerHTML = `
                <i class="fa-solid fa-image"></i>
                <span>${file.name.length > 20 ? file.name.slice(0, 18) + '…' : file.name}</span>
                <span class="size">${sizeText}</span>
            `;
            fileChips.appendChild(chip);
        });

        if (files.length > 8) {
            const more = document.createElement('span');
            more.className = 'pimg-file-chip';
            more.innerHTML = `<i class="fa-solid fa-plus"></i> +${files.length - 8} more`;
            fileChips.appendChild(more);
        }
    }

    /* ---------- 4.2 Primary Selection with Animation ---------- */
    gallery.addEventListener('change', (e) => {
        if (e.target.name !== 'primaryImg') return;

        // Remove all primary states
        gallery.querySelectorAll('.pimg-card').forEach(card => {
            card.classList.remove('is-primary');
            const badge = card.querySelector('.pimg-primary-badge');
            if (badge) badge.remove();
            const lbl = card.querySelector('.pimg-radio-label');
            if (lbl) lbl.classList.remove('active');
        });

        // Add to selected card
        const selectedCard = e.target.closest('.pimg-card');
        selectedCard.classList.add('is-primary');

        // Add badge
        const badge = document.createElement('span');
        badge.className = 'pimg-primary-badge';
        badge.innerHTML = '<i class="fa-solid fa-star"></i> Primary';
        selectedCard.prepend(badge);

        const lbl = selectedCard.querySelector('.pimg-radio-label');
        if (lbl) lbl.classList.add('active');
    });

    /* ---------- 4.3 Delete Image ---------- */
    gallery.addEventListener('click', (e) => {
        const delBtn = e.target.closest('.pimg-delete-btn');
        if (!delBtn) return;

        const card = delBtn.closest('.pimg-card');
        if (!confirm('Delete this image permanently?')) return;

        card.style.transition = 'all 0.3s ease';
        card.style.opacity = '0';
        card.style.transform = 'scale(0.85)';

        setTimeout(() => {
            card.remove();
            if (gallery.querySelectorAll('.pimg-card').length === 0) {
                emptyState.classList.remove('d-none');
            }
        }, 300);
    });

    /* ---------- 4.4 Product Selector ---------- */
    const productSelect = document.getElementById('pimgProductSelect');
    const currentProduct = document.getElementById('pimgCurrentProduct');
    const galleryProductName = document.getElementById('pimgGalleryProductName');

    if (productSelect) {
        productSelect.addEventListener('change', function () {
            const selectedText = this.options[this.selectedIndex].text;
            const productName = selectedText.split(' (ID:')[0];
            currentProduct.textContent = productName;
            galleryProductName.textContent = productName;
        });
    }

    /* ---------- 4.5 Save Button Demo ---------- */
    if (saveBtn) {
        saveBtn.addEventListener('click', function () {
            const btn = this;
            const originalHTML = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Saving...';

            setTimeout(() => {
                btn.innerHTML = '<i class="fa-solid fa-check me-1"></i> Saved!';
                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                    btn.disabled = false;
                }, 1200);
            }, 800);
        });
    }
})();


/* ============================================================
   5. ATTRIBUTES
   ============================================================ */

/* ---------- 5.1 Attribute List + Variant List — Search & Filter ---------- */
(function initAttributesList() {
    /* Attribute search */
    const attrSearch = document.getElementById('attrSearchInput');
    const attrTable = document.getElementById('attrTableBody');
    const attrEmpty = document.getElementById('attrEmptyState');

    if (attrSearch && attrTable) {
        attrSearch.addEventListener('input', function () {
            const q = this.value.toLowerCase().trim();
            let count = 0;
            attrTable.querySelectorAll('tr').forEach(row => {
                const match = row.textContent.toLowerCase().includes(q);
                row.style.display = match ? '' : 'none';
                if (match) count++;
            });
            attrEmpty.classList.toggle('d-none', count > 0);
        });
    }

    /* Variant search + stock filter */
    const vSearch = document.getElementById('variantSearchInput');
    const vFilter = document.getElementById('variantStockFilter');
    const vTable = document.getElementById('variantTableBody');
    const vEmpty = document.getElementById('variantEmptyState');

    if (vSearch && vTable) {
        function filterVariants() {
            const q = vSearch.value.toLowerCase().trim();
            const stock = vFilter.value;
            let count = 0;

            vTable.querySelectorAll('tr').forEach(row => {
                const matchText = row.textContent.toLowerCase().includes(q);
                const matchStock = (stock === 'all') || (row.dataset.stock === stock);
                const show = matchText && matchStock;
                row.style.display = show ? '' : 'none';
                if (show) count++;
            });
            vEmpty.classList.toggle('d-none', count > 0);
        }

        vSearch.addEventListener('input', filterVariants);
        vFilter.addEventListener('change', filterVariants);
    }
})();

/* ---------- 5.2 Create Attribute — Tag Builder, Icon Picker, Submit ---------- */
(function initCreateAttribute() {
    const builder = document.getElementById('afValuesBuilder');
    const valueInput = document.getElementById('afValueInput');
    const preview = document.getElementById('afPreviewTags');
    const form = document.getElementById('createAttributeForm');
    const nameInput = document.getElementById('attrName');

    if (!builder || !valueInput) return;

    const values = [];

    /* Add value pill */
    function addValue(val) {
        val = val.trim();
        if (!val) return;
        if (values.includes(val)) return;

        values.push(val);
        renderPills();
        renderPreview();
    }

    function removeValue(val) {
        const idx = values.indexOf(val);
        if (idx > -1) values.splice(idx, 1);
        renderPills();
        renderPreview();
    }

    function renderPills() {
        builder.querySelectorAll('.af-value-pill').forEach(p => p.remove());

        values.forEach(val => {
            const pill = document.createElement('span');
            pill.className = 'af-value-pill';
            pill.innerHTML = `
                <span>${val}</span>
                <button type="button" class="remove" data-val="${val}">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            `;
            builder.insertBefore(pill, valueInput);
        });
    }

    function renderPreview() {
        if (!values.length) {
            preview.innerHTML = '<span class="text-muted">Values will appear here as you add them…</span>';
            return;
        }
        preview.innerHTML = values
            .map(v => `<span class="preview-pill">${v}</span>`)
            .join('');
    }

    /* Input events */
    valueInput.addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ',') {
            e.preventDefault();
            addValue(valueInput.value);
            valueInput.value = '';
        }
        if (e.key === 'Backspace' && !valueInput.value && values.length) {
            removeValue(values[values.length - 1]);
        }
    });

    valueInput.addEventListener('blur', () => {
        if (valueInput.value.trim()) {
            addValue(valueInput.value);
            valueInput.value = '';
        }
    });

    builder.addEventListener('click', e => {
        if (e.target.closest('.remove')) {
            const val = e.target.closest('.remove').dataset.val;
            removeValue(val);
            return;
        }
        if (e.target === builder) valueInput.focus();
    });

    /* Icon picker */
    const iconGrid = document.getElementById('afIconGrid');
    if (iconGrid) {
        iconGrid.addEventListener('click', e => {
            const opt = e.target.closest('.af-icon-option');
            if (!opt) return;
            iconGrid.querySelectorAll('.af-icon-option').forEach(o => o.classList.remove('selected'));
            opt.classList.add('selected');
        });
    }

    /* Submit */
    form.addEventListener('submit', e => {
        e.preventDefault();

        if (!nameInput.value.trim()) {
            nameInput.focus();
            nameInput.style.borderColor = 'var(--danger)';
            return;
        }
        if (!values.length) {
            valueInput.focus();
            valueInput.style.borderColor = 'var(--danger)';
            alert('Please add at least one attribute value.');
            return;
        }

        alert('✅ Attribute "' + nameInput.value + '" with ' + values.length + ' values saved!');
        window.location.href = 'attributes.html';
    });
})();


/* ============================================================
   6. VARIANTS — CREATE FORM
   ============================================================ */
(function initCreateVariant() {
    const builder = document.getElementById('vfAttrsBuilder');
    const addBtn = document.getElementById('vfAddAttrBtn');
    const comboPreview = document.getElementById('vfComboPreview');
    const form = document.getElementById('createVariantForm');

    const productSelect = document.getElementById('vfProduct');
    const skuInput = document.getElementById('vfSku');
    const summaryProduct = document.getElementById('vfSummaryProduct');
    const summarySku = document.getElementById('vfSummarySku');
    const summaryCombo = document.getElementById('vfSummaryCombo');

    if (!builder) return;

    /* Attribute definitions (from backend) */
    const availableAttributes = {
        'color':    { name: 'Color',    values: ['Red', 'Blue', 'Black', 'White', 'Green'] },
        'size':     { name: 'Size',     values: ['Small (S)', 'Medium (M)', 'Large (L)', 'Extra Large (XL)'] },
        'ram':      { name: 'RAM',      values: ['8GB', '16GB', '32GB', '64GB'] },
        'storage':  { name: 'Storage',  values: ['128GB', '256GB', '512GB', '1TB'] },
        'material': { name: 'Material', values: ['Cotton', 'Polyester', 'Nylon', 'Wool'] }
    };

    /* Build one attribute row */
    function createAttrRow(initialAttr = '', initialVal = '') {
        const row = document.createElement('div');
        row.className = 'vf-attr-row';

        const attrOptions = Object.entries(availableAttributes)
            .map(([key, def]) =>
                `<option value="${key}" ${key === initialAttr ? 'selected' : ''}>${def.name}</option>`
            ).join('');

        row.innerHTML = `
            <select class="vf-select attr-key">
                <option value="">Select attribute</option>
                ${attrOptions}
            </select>
            <select class="vf-select attr-val" ${!initialAttr ? 'disabled' : ''}>
                <option value="">Select value</option>
            </select>
            <button type="button" class="vf-attr-remove" title="Remove">
                <i class="fa-solid fa-xmark"></i>
            </button>
        `;

        const keySelect = row.querySelector('.attr-key');
        const valSelect = row.querySelector('.attr-val');
        const removeBtn = row.querySelector('.vf-attr-remove');

        function populateValues(selected = '') {
            const key = keySelect.value;
            if (!key) {
                valSelect.disabled = true;
                valSelect.innerHTML = '<option value="">Select value</option>';
                return;
            }
            valSelect.disabled = false;
            valSelect.innerHTML = '<option value="">Select value</option>' +
                availableAttributes[key].values.map(v =>
                    `<option value="${v}" ${v === selected ? 'selected' : ''}>${v}</option>`
                ).join('');
        }

        if (initialAttr) populateValues(initialVal);

        keySelect.addEventListener('change', () => {
            populateValues();
            updatePreview();
        });
        valSelect.addEventListener('change', updatePreview);

        removeBtn.addEventListener('click', () => {
            row.style.transition = 'all 0.25s ease';
            row.style.opacity = '0';
            row.style.transform = 'translateX(-10px)';
            setTimeout(() => {
                row.remove();
                updatePreview();
            }, 200);
        });

        return row;
    }

    /* Add default rows */
    builder.appendChild(createAttrRow('color', ''));
    builder.appendChild(createAttrRow('size', ''));

    /* Add new row */
    addBtn.addEventListener('click', () => {
        builder.appendChild(createAttrRow());
    });

    /* Combo preview */
    function updatePreview() {
        const rows = builder.querySelectorAll('.vf-attr-row');
        const chips = [];

        rows.forEach(row => {
            const key = row.querySelector('.attr-key').value;
            const val = row.querySelector('.attr-val').value;
            if (key && val) {
                chips.push(`${availableAttributes[key].name}: ${val}`);
            }
        });

        if (!chips.length) {
            comboPreview.innerHTML = '<span class="text-muted small">Fill attributes to preview…</span>';
            summaryCombo.textContent = '—';
            return;
        }

        comboPreview.innerHTML = chips
            .map(c => `<span class="vf-preview-chip">${c}</span>`)
            .join('');

        summaryCombo.textContent = chips.join(' + ');
    }

    /* Summary updates */
    if (productSelect) {
        productSelect.addEventListener('change', function () {
            summaryProduct.textContent = this.value
                ? this.options[this.selectedIndex].text
                : '—';
        });
    }
    if (skuInput) {
        skuInput.addEventListener('input', function () {
            summarySku.textContent = this.value || '—';
        });
    }

    /* Image upload */
    const uploadBox = document.getElementById('vfUploadBox');
    const fileInput = document.getElementById('vfImageInput');
    const previewBox = document.getElementById('vfUploadPreview');
    const previewImg = document.getElementById('vfPreviewImg');

    if (uploadBox) {
        uploadBox.addEventListener('click', () => fileInput.click());
        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (!file) return;
            if (file.size > 2 * 1024 * 1024) {
                alert('File size exceeds 2 MB.');
                this.value = '';
                return;
            }
            const r = new FileReader();
            r.onload = e => {
                previewImg.src = e.target.result;
                previewBox.style.display = 'block';
                uploadBox.style.display = 'none';
            };
            r.readAsDataURL(file);
        });
    }

    /* Submit */
    form.addEventListener('submit', e => {
        e.preventDefault();

        const productVal = productSelect.value;
        const skuVal = skuInput.value.trim();

        if (!productVal) { productSelect.focus(); return; }
        if (!skuVal) { skuInput.focus(); skuInput.style.borderColor = 'var(--danger)'; return; }

        // Check at least one valid attribute pair
        let hasPair = false;
        builder.querySelectorAll('.vf-attr-row').forEach(row => {
            if (row.querySelector('.attr-key').value && row.querySelector('.attr-val').value) {
                hasPair = true;
            }
        });

        if (!hasPair) {
            alert('Please select at least one complete attribute combination.');
            return;
        }

        alert('✅ Variant "' + skuVal + '" created successfully!');
        window.location.href = 'attributes.html';
    });

    /* Init summary */
    if (productSelect.value) {
        summaryProduct.textContent = productSelect.options[productSelect.selectedIndex].text;
    }
})();


/* ============================================================
   7. COUPONS
   ============================================================ */

/* ---------- 7.1 Coupon List — Search, Filter, Copy Code ---------- */
(function initCouponsList() {
    const searchInput = document.getElementById('cpnSearchInput');
    const typeFilter = document.getElementById('cpnTypeFilter');
    const statusFilter = document.getElementById('cpnStatusFilter');
    const tableBody = document.getElementById('cpnTableBody');
    const emptyState = document.getElementById('cpnEmptyState');
    const filterBtn = document.getElementById('cpnFilterBtn');

    if (!tableBody) return;

    function applyFilters() {
        const q = searchInput.value.toLowerCase().trim();
        const type = typeFilter.value;
        const status = statusFilter.value;
        let count = 0;

        tableBody.querySelectorAll('tr').forEach(row => {
            const text = row.textContent.toLowerCase();
            const rType = row.dataset.type || '';
            const rStatus = row.dataset.status || '';

            const okSearch = text.includes(q);
            const okType = (type === 'all') || (rType === type);
            const okStatus = (status === 'all') || (rStatus === status);

            const show = okSearch && okType && okStatus;
            row.style.display = show ? '' : 'none';
            if (show) count++;
        });

        emptyState.classList.toggle('d-none', count > 0);
    }

    // Live filter
    searchInput.addEventListener('input', applyFilters);
    typeFilter.addEventListener('change', applyFilters);
    statusFilter.addEventListener('change', applyFilters);

    // Button triggers filter too
    if (filterBtn) {
        filterBtn.addEventListener('click', (e) => {
            e.preventDefault();
            applyFilters();
        });
    }

    /* Copy coupon code on click */
    tableBody.addEventListener('click', (e) => {
        const codeEl = e.target.closest('.cpn-code');
        if (!codeEl) return;
        const code = codeEl.textContent.trim();
        navigator.clipboard.writeText(code).then(() => {
            const original = codeEl.textContent;
            codeEl.textContent = '✓ Copied!';
            setTimeout(() => { codeEl.textContent = original; }, 900);
        }).catch(() => {});
    });
})();

/* ---------- 7.2 Create Coupon — Generator, Live Preview, Submit ---------- */
(function initCreateCoupon() {
    const form = document.getElementById('createCouponForm');
    const codeInput = document.getElementById('ccCode');
    const generateBtn = document.getElementById('ccGenerateBtn');
    const valueInput = document.getElementById('ccValue');
    const valueHint = document.getElementById('ccValueHint');
    const minSpendInput = document.getElementById('ccMinSpend');
    const startDate = document.getElementById('ccStartDate');
    const expiryDate = document.getElementById('ccExpiryDate');
    const typeOptions = document.querySelectorAll('.cc-type-option');

    // Preview elements
    const previewCode = document.getElementById('ccPreviewCode');
    const previewDiscount = document.getElementById('ccPreviewDiscount');
    const previewMin = document.getElementById('ccPreviewMin');
    const previewDates = document.getElementById('ccPreviewDates');

    if (!form) return;

    /* Discount type toggle */
    typeOptions.forEach(opt => {
        opt.addEventListener('click', () => {
            typeOptions.forEach(o => o.classList.remove('selected'));
            opt.classList.add('selected');
            opt.querySelector('input').checked = true;

            const type = opt.dataset.type;
            if (type === 'percentage') {
                valueHint.textContent = 'Enter percentage (1–100).';
                valueInput.placeholder = '15';
                valueInput.max = '100';
            } else {
                valueHint.textContent = 'Enter fixed discount amount.';
                valueInput.placeholder = '500';
                valueInput.removeAttribute('max');
            }
            updatePreview();
        });
    });

    function getActiveType() {
        return document.querySelector('.cc-type-option.selected')?.dataset.type || 'percentage';
    }

    /* Generate random coupon code */
    generateBtn.addEventListener('click', () => {
        const prefixes = ['SAVE', 'GET', 'DEAL', 'EID', 'FLASH', 'VIP', 'NEW'];
        const prefix = prefixes[Math.floor(Math.random() * prefixes.length)];
        const num = Math.floor(100 + Math.random() * 900);
        codeInput.value = prefix + num;
        updatePreview();
    });

    /* Live preview update */
    function formatDate(d) {
        if (!d) return '—';
        const dt = new Date(d);
        return dt.toLocaleDateString('en-GB', { day: '2-digit', month: 'short' });
    }

    function updatePreview() {
        // Code
        const code = codeInput.value.trim().toUpperCase() || 'COUPON';
        previewCode.textContent = code;

        // Discount
        const type = getActiveType();
        const val = valueInput.value.trim();
        if (val) {
            previewDiscount.textContent = type === 'percentage'
                ? val + '% OFF'
                : '৳ ' + val + ' OFF';
        } else {
            previewDiscount.textContent = type === 'percentage' ? '0% OFF' : '৳ 0 OFF';
        }

        // Min spend
        const min = minSpendInput.value.trim();
        previewMin.textContent = 'Min spend: ৳ ' + (min ? Number(min).toLocaleString() : '0');

        // Dates
        const s = formatDate(startDate.value);
        const e = formatDate(expiryDate.value);
        let datesText = 'Valid: ';
        if (s === '—' && e === '—') datesText += 'Select dates';
        else if (s === '—') datesText += 'Until ' + e;
        else if (e === '—') datesText += 'From ' + s;
        else datesText += s + ' – ' + e;
        previewDates.textContent = datesText;
    }

    // Bind events
    codeInput.addEventListener('input', () => {
        codeInput.value = codeInput.value.toUpperCase().replace(/[^A-Z0-9-]/g, '');
        updatePreview();
    });
    valueInput.addEventListener('input', updatePreview);
    minSpendInput.addEventListener('input', updatePreview);
    startDate.addEventListener('change', updatePreview);
    expiryDate.addEventListener('change', updatePreview);

    /* Set default dates */
    const today = new Date();
    const nextMonth = new Date();
    nextMonth.setMonth(nextMonth.getMonth() + 1);

    function toISO(d) {
        return d.toISOString().split('T')[0];
    }
    startDate.value = toISO(today);
    expiryDate.value = toISO(nextMonth);
    updatePreview();

    /* Submit */
    form.addEventListener('submit', e => {
        e.preventDefault();

        if (!codeInput.value.trim()) {
            codeInput.focus();
            codeInput.style.borderColor = 'var(--danger)';
            return;
        }
        if (!valueInput.value.trim()) {
            valueInput.focus();
            valueInput.style.borderColor = 'var(--danger)';
            return;
        }
        if (!startDate.value || !expiryDate.value) {
            alert('Please select both start and expiry dates.');
            return;
        }
        if (new Date(startDate.value) > new Date(expiryDate.value)) {
            alert('Expiry date must be after start date.');
            return;
        }

        alert('✅ Coupon "' + codeInput.value + '" created successfully!');
        window.location.href = 'coupons.html';
    });
})();


/* ============================================================
   8. ORDERS — FILTER, INLINE STATUS, COPY ID, EXPORT
   ============================================================ */
(function initOrdersPage() {
    const searchInput = document.getElementById('ordSearchInput');
    const statusFilter = document.getElementById('ordStatusFilter');
    const dateFilter = document.getElementById('ordDateFilter');
    const resetBtn = document.getElementById('ordResetBtn');
    const tableBody = document.getElementById('ordTableBody');
    const emptyState = document.getElementById('ordEmptyState');
    const exportBtn = document.getElementById('ordExportBtn');

    if (!tableBody) return;

    /* ---------- 8.1 Filtering ---------- */
    function applyFilters() {
        const q = searchInput.value.toLowerCase().trim();
        const status = statusFilter.value;
        let count = 0;

        tableBody.querySelectorAll('tr').forEach(row => {
            const text = row.textContent.toLowerCase();
            const rStatus = row.dataset.status || '';

            const okSearch = text.includes(q);
            const okStatus = (status === 'all') || (rStatus === status);

            const show = okSearch && okStatus;
            row.style.display = show ? '' : 'none';
            if (show) count++;
        });

        emptyState.classList.toggle('d-none', count > 0);
    }

    searchInput.addEventListener('input', applyFilters);
    statusFilter.addEventListener('change', applyFilters);
    dateFilter.addEventListener('change', applyFilters);

    resetBtn.addEventListener('click', () => {
        searchInput.value = '';
        statusFilter.value = 'all';
        dateFilter.value = '';
        applyFilters();
    });

    /* ---------- 8.2 Inline Status Change -> Update Pill ---------- */
    tableBody.addEventListener('change', e => {
        if (!e.target.classList.contains('ord-status-select')) return;

        const newStatus = e.target.value;
        const row = e.target.closest('tr');
        row.dataset.status = newStatus;

        // Update pill
        const pill = row.querySelector('.ord-status');
        pill.className = 'ord-status ord-status-' + newStatus;
        pill.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);

        // Animate pill
        pill.style.transition = 'transform 0.3s ease';
        pill.style.transform = 'scale(1.15)';
        setTimeout(() => { pill.style.transform = 'scale(1)'; }, 300);

        // Optional log
        const orderId = e.target.dataset.order;
        console.log('Order ' + orderId + ' status changed to: ' + newStatus);
    });

    /* ---------- 8.3 Copy Order ID on Click ---------- */
    tableBody.addEventListener('click', e => {
        const el = e.target.closest('.ord-id');
        if (!el) return;

        const text = el.dataset.copy || el.textContent.trim();
        navigator.clipboard.writeText(text).then(() => {
            const original = el.textContent;
            el.textContent = '✓ Copied!';
            setTimeout(() => { el.textContent = original; }, 900);
        }).catch(() => {});
    });

    /* ---------- 8.4 Export Button Demo ---------- */
    exportBtn.addEventListener('click', function () {
        const original = this.innerHTML;
        this.disabled = true;
        this.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Exporting...';

        setTimeout(() => {
            this.innerHTML = '<i class="fa-solid fa-check me-1"></i> Exported!';
            setTimeout(() => {
                this.innerHTML = original;
                this.disabled = false;
            }, 1200);
        }, 1000);
    });

    /* ---------- 8.5 Status History Form Demo ---------- */
    const statusForm = document.getElementById('ordStatusForm');
    if (statusForm) {
        statusForm.addEventListener('submit', e => {
            e.preventDefault();
            alert('✅ Status & note saved to history!');
            const modal = bootstrap.Modal.getInstance(
                document.getElementById('statusHistoryModal')
            );
            if (modal) modal.hide();
        });
    }
})();


/* ============================================================
   9. PAYMENTS — FILTER, COPY TRX, EXPORT
   ============================================================ */
(function initPaymentsPage() {
    const searchInput = document.getElementById('paySearchInput');
    const gatewayFilter = document.getElementById('payGatewayFilter');
    const statusFilter = document.getElementById('payStatusFilter');
    const resetBtn = document.getElementById('payResetBtn');
    const tableBody = document.getElementById('payTableBody');
    const emptyState = document.getElementById('payEmptyState');
    const exportBtn = document.getElementById('payExportBtn');

    if (!tableBody) return;

    /* ---------- 9.1 Filtering ---------- */
    function applyFilters() {
        const q = searchInput.value.toLowerCase().trim();
        const gateway = gatewayFilter.value;
        const status = statusFilter.value;
        let count = 0;

        tableBody.querySelectorAll('tr').forEach(row => {
            const text = row.textContent.toLowerCase();
            const rGateway = row.dataset.gateway || '';
            const rStatus = row.dataset.status || '';

            const okSearch = text.includes(q);
            const okGateway = (gateway === 'all') || (rGateway === gateway);
            const okStatus = (status === 'all') || (rStatus === status);

            const show = okSearch && okGateway && okStatus;
            row.style.display = show ? '' : 'none';
            if (show) count++;
        });

        emptyState.classList.toggle('d-none', count > 0);
    }

    searchInput.addEventListener('input', applyFilters);
    gatewayFilter.addEventListener('change', applyFilters);
    statusFilter.addEventListener('change', applyFilters);

    resetBtn.addEventListener('click', () => {
        searchInput.value = '';
        gatewayFilter.value = 'all';
        statusFilter.value = 'all';
        applyFilters();
    });

    /* ---------- 9.2 Copy Trx ID on Click ---------- */
    tableBody.addEventListener('click', e => {
        const el = e.target.closest('.pay-trx-id');
        if (!el) return;

        const text = el.dataset.copy || el.textContent.trim();
        navigator.clipboard.writeText(text).then(() => {
            const original = el.textContent;
            el.textContent = '✓ Copied!';
            el.style.color = 'var(--success)';
            setTimeout(() => {
                el.textContent = original;
                el.style.color = '';
            }, 900);
        }).catch(() => {});
    });

    /* ---------- 9.3 Export Button Demo ---------- */
    if (exportBtn) {
        exportBtn.addEventListener('click', function () {
            const original = this.innerHTML;
            this.disabled = true;
            this.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Exporting...';

            setTimeout(() => {
                this.innerHTML = '<i class="fa-solid fa-check me-1"></i> Exported!';
                setTimeout(() => {
                    this.innerHTML = original;
                    this.disabled = false;
                }, 1200);
            }, 1000);
        });
    }
})();


/* ============================================================
   10. RETURNS & REFUNDS — FILTER, INSPECT, DECISION, EXPORT
   ============================================================ */
(function initReturnsPage() {
    const searchInput = document.getElementById('retSearchInput');
    const statusFilter = document.getElementById('retStatusFilter');
    const resetBtn = document.getElementById('retResetBtn');
    const tableBody = document.getElementById('retTableBody');
    const emptyState = document.getElementById('retEmptyState');
    const exportBtn = document.getElementById('retExportBtn');

    if (!tableBody) return;

    /* ---------- 10.1 Filtering ---------- */
    function applyFilters() {
        const q = searchInput.value.toLowerCase().trim();
        const status = statusFilter.value;
        let count = 0;

        tableBody.querySelectorAll('tr').forEach(row => {
            const text = row.textContent.toLowerCase();
            const rStatus = row.dataset.status || '';

            const okSearch = text.includes(q);
            const okStatus = (status === 'all') || (rStatus === status);

            const show = okSearch && okStatus;
            row.style.display = show ? '' : 'none';
            if (show) count++;
        });

        emptyState.classList.toggle('d-none', count > 0);
    }

    searchInput.addEventListener('input', applyFilters);
    statusFilter.addEventListener('change', applyFilters);

    resetBtn.addEventListener('click', () => {
        searchInput.value = '';
        statusFilter.value = 'all';
        applyFilters();
    });

    /* ---------- 10.2 Copy Return ID ---------- */
    tableBody.addEventListener('click', e => {
        const el = e.target.closest('.ret-id');
        if (!el) return;

        const text = el.dataset.copy || el.textContent.trim();
        navigator.clipboard.writeText(text).then(() => {
            const original = el.textContent;
            el.textContent = '✓ Copied!';
            el.style.color = 'var(--success)';
            setTimeout(() => {
                el.textContent = original;
                el.style.color = '';
            }, 900);
        }).catch(() => {});
    });

    /* ---------- 10.3 Inspection Checklist Toggle ---------- */
    const inspectList = document.getElementById('retInspectList');
    if (inspectList) {
        inspectList.addEventListener('change', e => {
            if (e.target.matches('input[type="checkbox"]')) {
                const label = e.target.closest('.ret-inspect-item');
                if (e.target.checked) label.classList.add('checked');
                else label.classList.remove('checked');
            }
        });
    }

    /* ---------- 10.4 Approve / Reject Buttons ---------- */
    const decisionForm = document.getElementById('retDecisionForm');
    if (decisionForm) {
        decisionForm.addEventListener('submit', e => {
            e.preventDefault();
            alert('✅ Return decision saved!');
            const modal = bootstrap.Modal.getInstance(
                document.getElementById('processReturnModal')
            );
            if (modal) modal.hide();
        });
    }

    /* ---------- 10.5 Confirm Refund Form ---------- */
    const refundForm = document.getElementById('retRefundForm');
    if (refundForm) {
        refundForm.addEventListener('submit', e => {
            e.preventDefault();
            alert('✅ Refund processed successfully!');
            const modal = bootstrap.Modal.getInstance(
                document.getElementById('issueRefundModal')
            );
            if (modal) modal.hide();
        });
    }

    /* ---------- 10.6 Export Button ---------- */
    if (exportBtn) {
        exportBtn.addEventListener('click', function () {
            const original = this.innerHTML;
            this.disabled = true;
            this.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Exporting...';

            setTimeout(() => {
                this.innerHTML = '<i class="fa-solid fa-check me-1"></i> Exported!';
                setTimeout(() => {
                    this.innerHTML = original;
                    this.disabled = false;
                }, 1200);
            }, 1000);
        });
    }
})();


/* ============================================================
   11. OFFERS / CAMPAIGNS
   ============================================================ */

/* ---------- 11.1 Offers List — Filter, Map Products, Edit ---------- */
(function initOffersPage() {
    const searchInput = document.getElementById('offSearchInput');
    const statusFilter = document.getElementById('offStatusFilter');
    const resetBtn = document.getElementById('offResetBtn');
    const tableBody = document.getElementById('offTableBody');
    const emptyState = document.getElementById('offEmptyState');

    if (!tableBody) return;

    /* ---------- Filtering ---------- */
    function applyFilters() {
        const q = searchInput.value.toLowerCase().trim();
        const status = statusFilter.value;
        let count = 0;

        tableBody.querySelectorAll('tr').forEach(row => {
            const text = row.textContent.toLowerCase();
            const rStatus = row.dataset.status || '';

            const okSearch = text.includes(q);
            const okStatus = (status === 'all') || (rStatus === status);

            const show = okSearch && okStatus;
            row.style.display = show ? '' : 'none';
            if (show) count++;
        });

        emptyState.classList.toggle('d-none', count > 0);
    }

    searchInput.addEventListener('input', applyFilters);
    statusFilter.addEventListener('change', applyFilters);

    resetBtn.addEventListener('click', () => {
        searchInput.value = '';
        statusFilter.value = 'all';
        applyFilters();
    });

    /* ---------- Map Products: Checkbox Toggle ---------- */
    const mapList = document.getElementById('offMapList');
    const selectedCount = document.getElementById('offSelectedCount');
    const mapSearch = document.getElementById('offMapSearch');

    function updateSelectedCount() {
        const n = mapList.querySelectorAll('input[type="checkbox"]:checked').length;
        selectedCount.textContent = n + (n === 1 ? ' product selected' : ' products selected');
    }

    if (mapList) {
        mapList.addEventListener('change', e => {
            if (!e.target.matches('input[type="checkbox"]')) return;
            const item = e.target.closest('.off-map-item');
            const priceInput = item.querySelector('.mi-input input');

            if (e.target.checked) {
                item.classList.add('selected');
                priceInput.disabled = false;
                priceInput.focus();
            } else {
                item.classList.remove('selected');
                priceInput.disabled = true;
                priceInput.value = '';
            }
            updateSelectedCount();
        });

        /* Map search filter */
        mapSearch.addEventListener('input', function () {
            const q = this.value.toLowerCase().trim();
            mapList.querySelectorAll('.off-map-item').forEach(item => {
                const match = item.textContent.toLowerCase().includes(q);
                item.style.display = match ? '' : 'none';
            });
        });

        /* Save button demo */
        document.getElementById('offMapSaveBtn').addEventListener('click', function () {
            const original = this.innerHTML;
            this.disabled = true;
            this.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Saving...';

            setTimeout(() => {
                this.innerHTML = '<i class="fa-solid fa-check me-1"></i> Saved!';
                setTimeout(() => {
                    this.innerHTML = original;
                    this.disabled = false;
                    const modal = bootstrap.Modal.getInstance(
                        document.getElementById('mapProductsModal')
                    );
                    if (modal) modal.hide();
                }, 800);
            }, 700);
        });
    }

    /* ---------- Edit Campaign Submit ---------- */
    const editForm = document.getElementById('editCampaignForm');
    if (editForm) {
        editForm.addEventListener('submit', e => {
            e.preventDefault();
            alert('✅ Campaign updated!');
            const modal = bootstrap.Modal.getInstance(
                document.getElementById('editCampaignModal')
            );
            if (modal) modal.hide();
        });
    }
})();

/* ---------- 11.2 Create Offer — Slug, Preview, Banner, Submit ---------- */
(function initCreateOffer() {
    const form = document.getElementById('createCampaignForm');
    const titleInput = document.getElementById('coTitle');
    const slugInput = document.getElementById('coSlug');
    const valueInput = document.getElementById('coValue');
    const valueHint = document.getElementById('coValueHint');
    const minSpendInput = document.getElementById('coMinSpend');
    const startDate = document.getElementById('coStartDate');
    const endDate = document.getElementById('coEndDate');
    const typeOptions = document.querySelectorAll('.co-type-option');

    // Preview elements
    const previewTitle = document.getElementById('coPreviewTitle');
    const previewDiscount = document.getElementById('coPreviewDiscount');
    const previewMin = document.getElementById('coPreviewMin');
    const previewDates = document.getElementById('coPreviewDates');

    if (!form) return;

    /* Discount type toggle */
    typeOptions.forEach(opt => {
        opt.addEventListener('click', () => {
            typeOptions.forEach(o => o.classList.remove('selected'));
            opt.classList.add('selected');
            opt.querySelector('input').checked = true;

            const type = opt.dataset.type;
            if (type === 'percentage') {
                valueHint.textContent = 'Enter percentage (1–100).';
                valueInput.placeholder = '20';
                valueInput.max = '100';
            } else {
                valueHint.textContent = 'Enter fixed discount amount.';
                valueInput.placeholder = '300';
                valueInput.removeAttribute('max');
            }
            updatePreview();
        });
    });

    function getActiveType() {
        return document.querySelector('.co-type-option.selected')?.dataset.type || 'percentage';
    }

    /* Auto slug from title */
    let slugManuallyEdited = false;
    titleInput.addEventListener('input', function () {
        if (!slugManuallyEdited) {
            slugInput.value = this.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        }
        updatePreview();
    });
    slugInput.addEventListener('input', function () {
        slugManuallyEdited = this.value.length > 0;
    });

    /* Live preview */
    function formatDate(d) {
        if (!d) return '—';
        const dt = new Date(d);
        return dt.toLocaleDateString('en-GB', { day: '2-digit', month: 'short' });
    }

    function updatePreview() {
        previewTitle.textContent = titleInput.value.trim() || 'Campaign Title';

        const type = getActiveType();
        const val = valueInput.value.trim();
        if (val) {
            previewDiscount.textContent = type === 'percentage'
                ? val + '% OFF'
                : '৳ ' + val + ' OFF';
        } else {
            previewDiscount.textContent = type === 'percentage' ? '0% OFF' : '৳ 0 OFF';
        }

        const min = minSpendInput.value.trim();
        previewMin.textContent = 'Min spend: ৳ ' + (min ? Number(min).toLocaleString() : '0');

        const s = formatDate(startDate.value);
        const e = formatDate(endDate.value);
        let t = '';
        if (s === '—' && e === '—') t = 'Select dates';
        else if (s === '—') t = 'Until ' + e;
        else if (e === '—') t = 'From ' + s;
        else t = s + ' – ' + e;
        previewDates.textContent = t;
    }

    valueInput.addEventListener('input', updatePreview);
    minSpendInput.addEventListener('input', updatePreview);
    startDate.addEventListener('change', updatePreview);
    endDate.addEventListener('change', updatePreview);

    /* Default dates */
    const now = new Date();
    const nextWeek = new Date();
    nextWeek.setDate(nextWeek.getDate() + 7);

    function toLocal(d) {
        return new Date(d.getTime() - d.getTimezoneOffset() * 60000)
            .toISOString()
            .slice(0, 16);
    }
    startDate.value = toLocal(now);
    endDate.value = toLocal(nextWeek);
    updatePreview();

    /* Banner upload */
    const bannerBox = document.getElementById('coBannerBox');
    const fileInput = document.getElementById('coBannerInput');
    const previewBox = document.getElementById('coBannerPreview');
    const previewImg = document.getElementById('coBannerImg');

    if (bannerBox) {
        bannerBox.addEventListener('click', () => fileInput.click());
        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (!file) return;
            if (file.size > 3 * 1024 * 1024) {
                alert('File size exceeds 3 MB.');
                this.value = '';
                return;
            }
            const r = new FileReader();
            r.onload = e => {
                previewImg.src = e.target.result;
                previewBox.style.display = 'block';
                bannerBox.style.display = 'none';
            };
            r.readAsDataURL(file);
        });
    }

    /* Submit */
    form.addEventListener('submit', e => {
        e.preventDefault();

        if (!titleInput.value.trim()) {
            titleInput.focus();
            titleInput.style.borderColor = 'var(--danger)';
            return;
        }
        if (!valueInput.value.trim()) {
            valueInput.focus();
            valueInput.style.borderColor = 'var(--danger)';
            return;
        }
        if (!startDate.value || !endDate.value) {
            alert('Please select both start and end dates.');
            return;
        }
        if (new Date(startDate.value) >= new Date(endDate.value)) {
            alert('End date must be after start date.');
            return;
        }

        alert('✅ Campaign "' + titleInput.value + '" created successfully!');
        window.location.href = 'offers.html';
    });
})();


/* ============================================================
   12. CUSTOMERS — FILTER, COPY EMAIL, EXPORT
   ============================================================ */
(function initCustomersPage() {
    const searchInput = document.getElementById('custSearchInput');
    const statusFilter = document.getElementById('custStatusFilter');
    const resetBtn = document.getElementById('custResetBtn');
    const tableBody = document.getElementById('custTableBody');
    const emptyState = document.getElementById('custEmptyState');
    const exportBtn = document.getElementById('custExportBtn');

    if (!tableBody) return;

    /* ---------- 12.1 Filtering ---------- */
    function applyFilters() {
        const q = searchInput.value.toLowerCase().trim();
        const status = statusFilter.value;
        let count = 0;

        tableBody.querySelectorAll('tr').forEach(row => {
            const text = row.textContent.toLowerCase();
            const rStatus = row.dataset.status || '';

            const okSearch = text.includes(q);
            const okStatus = (status === 'all') || (rStatus === status);

            const show = okSearch && okStatus;
            row.style.display = show ? '' : 'none';
            if (show) count++;
        });

        emptyState.classList.toggle('d-none', count > 0);
    }

    searchInput.addEventListener('input', applyFilters);
    statusFilter.addEventListener('change', applyFilters);

    resetBtn.addEventListener('click', () => {
        searchInput.value = '';
        statusFilter.value = 'all';
        applyFilters();
    });

    /* ---------- 12.2 Copy Email on Click ---------- */
    tableBody.addEventListener('click', e => {
        const el = e.target.closest('.cust-email');
        if (!el) return;

        const text = el.dataset.copy || el.textContent.trim();
        navigator.clipboard.writeText(text).then(() => {
            const original = el.innerHTML;
            el.innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
            el.style.color = 'var(--success)';
            setTimeout(() => {
                el.innerHTML = original;
                el.style.color = '';
            }, 900);
        }).catch(() => {});
    });

    /* ---------- 12.3 Export Button Demo ---------- */
    if (exportBtn) {
        exportBtn.addEventListener('click', function () {
            const original = this.innerHTML;
            this.disabled = true;
            this.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Exporting...';

            setTimeout(() => {
                this.innerHTML = '<i class="fa-solid fa-check me-1"></i> Exported!';
                setTimeout(() => {
                    this.innerHTML = original;
                    this.disabled = false;
                }, 1200);
            }, 1000);
        });
    }
})();


/* ============================================================
   13. SETTINGS — TABS, SAVE, GATEWAY TOGGLES, RESET
   ============================================================ */
(function initSettingsPage() {
    const tabButtons = document.querySelectorAll('.set-tab-btn');
    const panels = document.querySelectorAll('.set-panel');

    if (!tabButtons.length) return;

    /* ---------- 13.1 Tab Switching ---------- */
    tabButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const target = btn.dataset.tab;

            // Update buttons
            tabButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // Update panels
            panels.forEach(p => p.classList.remove('active'));
            const panel = document.getElementById('panel-' + target);
            if (panel) {
                panel.classList.add('active');
                // Smooth scroll to panel on mobile
                if (window.innerWidth < 992) {
                    panel.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }

            // Persist last active tab
            try {
                localStorage.setItem('settings_active_tab', target);
            } catch (e) {}
        });
    });

    /* ---------- 13.2 Restore Last Active Tab ---------- */
    try {
        const saved = localStorage.getItem('settings_active_tab');
        if (saved) {
            const btn = document.querySelector(`.set-tab-btn[data-tab="${saved}"]`);
            if (btn) btn.click();
        }
    } catch (e) {}

    /* ---------- 13.3 Save Handlers with Visual Feedback ---------- */
    document.querySelectorAll('[id^="form-"]').forEach(form => {
        form.addEventListener('submit', e => {
            e.preventDefault();
            const btn = form.querySelector('.btn-gradient');
            if (!btn) return;

            const original = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Saving...';

            setTimeout(() => {
                btn.innerHTML = '<i class="fa-solid fa-check me-1"></i> Saved!';
                btn.style.background = 'linear-gradient(135deg,#10B981,#059669)';
                btn.style.boxShadow = '0 4px 12px rgba(16,185,129,0.3)';

                setTimeout(() => {
                    btn.innerHTML = original;
                    btn.disabled = false;
                    btn.style.background = '';
                    btn.style.boxShadow = '';
                }, 1400);
            }, 700);
        });
    });

    /* ---------- 13.4 Toggle Switch: Sync Enabled/Disabled Badge ---------- */
    document.querySelectorAll('.set-gateway').forEach(card => {
        const checkbox = card.querySelector('input[type="checkbox"]');
        const badge = card.querySelector('.set-gateway-status');
        if (!checkbox || !badge) return;

        checkbox.addEventListener('change', () => {
            if (checkbox.checked) {
                card.classList.add('enabled');
                badge.className = 'set-gateway-status on';
                badge.textContent = 'Enabled';
            } else {
                card.classList.remove('enabled');
                badge.className = 'set-gateway-status off';
                badge.textContent = 'Disabled';
            }
        });
    });

    /* ---------- 13.5 Reset Buttons ---------- */
    document.querySelectorAll('.btn-soft').forEach(btn => {
        btn.addEventListener('click', e => {
            e.preventDefault();
            const form = btn.closest('form');
            if (form && confirm('Discard all unsaved changes?')) {
                form.reset();
            }
        });
    });
})();