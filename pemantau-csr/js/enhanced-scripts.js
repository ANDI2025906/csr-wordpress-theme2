// Enhanced JavaScript untuk semua template
document.addEventListener('DOMContentLoaded', function() {
    
    // ===== GLOBAL FUNCTIONS =====
    
    // Smooth scrolling untuk semua anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Lazy loading untuk gambar
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
    
    // ===== PERUSAHAAN PAGE ENHANCEMENTS =====
    
    // Advanced filtering dengan animasi
    function initCompanyFilters() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const companyCards = document.querySelectorAll('.company-card');
        const searchInput = document.getElementById('companySearch');
        
        if (!filterBtns.length) return;
        
        let currentFilter = 'all';
        let currentSearch = '';
        
        function filterCompanies() {
            companyCards.forEach((card, index) => {
                const category = card.getAttribute('data-category');
                const searchableText = card.getAttribute('data-searchable').toLowerCase();
                const companyName = card.querySelector('h3').textContent.toLowerCase();
                
                const matchesFilter = currentFilter === 'all' || category === currentFilter;
                const matchesSearch = currentSearch === '' || 
                    searchableText.includes(currentSearch) || 
                    companyName.includes(currentSearch);
                
                if (matchesFilter && matchesSearch) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, index * 100);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        }
        
        // Filter buttons
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                currentFilter = this.getAttribute('data-filter');
                
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                filterCompanies();
            });
        });
        
        // Search input
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                currentSearch = this.value.toLowerCase();
                filterCompanies();
            });
        }
    }
    
    // ===== FORUM PAGE ENHANCEMENTS =====
    
    function initForumFeatures() {
        // Auto-expand discussion on click
        const discussionItems = document.querySelectorAll('.discussion-item');
        
        discussionItems.forEach(item => {
            item.addEventListener('click', function() {
                // Add clicked state
                this.classList.toggle('expanded');
                
                // Simulate loading more content
                const excerpt = this.querySelector('.discussion-excerpt');
                if (this.classList.contains('expanded') && excerpt) {
                    const originalText = excerpt.textContent;
                    excerpt.textContent = originalText + ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.';
                }
            });
        });
        
        // Category hover effects
        // Category hover effects
        const categoryCards = document.querySelectorAll('.category-card');
        categoryCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
        
        // Load more discussions
        const loadMoreBtn = document.querySelector('.load-more-btn');
        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', function() {
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memuat...';
                
                // Simulate loading
                setTimeout(() => {
                    this.innerHTML = 'Muat Lebih Banyak';
                    // Add new discussions here
                }, 2000);
            });
        }
    }
    
    // ===== CONTACT PAGE ENHANCEMENTS =====
    
    function initContactFeatures() {
        // Form validation
        const contactForm = document.getElementById('contactForm');
        if (!contactForm) return;
        
        const inputs = contactForm.querySelectorAll('input, textarea, select');
        
        inputs.forEach(input => {
            input.addEventListener('blur', validateField);
            input.addEventListener('input', clearErrors);
        });
        
        function validateField(e) {
            const field = e.target;
            const value = field.value.trim();
            
            // Remove existing error
            clearFieldError(field);
            
            // Validate based on field type
            let isValid = true;
            let errorMessage = '';
            
            if (field.hasAttribute('required') && !value) {
                isValid = false;
                errorMessage = 'Field ini wajib diisi';
            } else if (field.type === 'email' && value && !isValidEmail(value)) {
                isValid = false;
                errorMessage = 'Format email tidak valid';
            } else if (field.type === 'tel' && value && !isValidPhone(value)) {
                isValid = false;
                errorMessage = 'Format nomor telepon tidak valid';
            }
            
            if (!isValid) {
                showFieldError(field, errorMessage);
            }
            
            return isValid;
        }
        
        function clearErrors(e) {
            clearFieldError(e.target);
        }
        
        function showFieldError(field, message) {
            field.classList.add('error');
            
            const errorElement = document.createElement('div');
            errorElement.className = 'field-error';
            errorElement.textContent = message;
            
            field.parentNode.appendChild(errorElement);
        }
        
        function clearFieldError(field) {
            field.classList.remove('error');
            const errorElement = field.parentNode.querySelector('.field-error');
            if (errorElement) {
                errorElement.remove();
            }
        }
        
        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }
        
        function isValidPhone(phone) {
            return /^[\+]?[0-9\s\-\(\)]{10,}$/.test(phone);
        }
    }
    
    // ===== GENERAL ENHANCEMENTS =====
    
    // Scroll to top button
    function initScrollToTop() {
        const scrollBtn = document.createElement('button');
        scrollBtn.className = 'scroll-to-top';
        scrollBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
        scrollBtn.setAttribute('aria-label', 'Scroll to top');
        document.body.appendChild(scrollBtn);
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollBtn.classList.add('visible');
            } else {
                scrollBtn.classList.remove('visible');
            }
        });
        
        scrollBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // Loading animation
    function showLoading() {
        const loader = document.createElement('div');
        loader.className = 'page-loader';
        loader.innerHTML = `
            <div class="loader-content">
                <div class="loader-spinner"></div>
                <p>Memuat...</p>
            </div>
        `;
        document.body.appendChild(loader);
        
        setTimeout(() => {
            loader.classList.add('fade-out');
            setTimeout(() => loader.remove(), 500);
        }, 1000);
    }
    
    // Initialize all features
    initCompanyFilters();
    initForumFeatures();
    initContactFeatures();
    initScrollToTop();
    
    // Show loading on page load
    if (document.readyState === 'loading') {
        showLoading();
    }
});
