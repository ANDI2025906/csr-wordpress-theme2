// Enhanced Effects JavaScript
document.addEventListener('DOMContentLoaded', function() {
    console.log('Enhanced effects loaded!'); // Debug log
    
    // Add enhanced classes to existing elements
    addEnhancedClasses();
    
    // Initialize scroll animations
    initScrollAnimations();
    
    // Initialize interactive effects
    initInteractiveEffects();
    
    // Add back to top button
    addBackToTopButton();
    
    // Initialize form enhancements
    initFormEnhancements();
});

function addEnhancedClasses() {
    // Add classes to page headers
    const pageHeaders = document.querySelectorAll('.page-header, .entry-header');
    pageHeaders.forEach(header => {
        header.classList.add('page-header');
    });
    
    // Add classes to titles
    const pageTitles = document.querySelectorAll('h1.page-title, h1.entry-title, .page-header h1');
    pageTitles.forEach(title => {
        title.classList.add('page-title');
    });
    
    // Add classes to sections
    const sections = document.querySelectorAll('section, .section');
    sections.forEach(section => {
        section.classList.add('enhanced-section');
    });
}

function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                
                // Add staggered animation to children
                const children = entry.target.querySelectorAll('.org-card, .company-card, .category-card');
                children.forEach((child, index) => {
                    setTimeout(() => {
                        child.style.opacity = '1';
                        child.style.transform = 'translateY(0)';
                    }, index * 100);
                });
            }
        });
    }, observerOptions);
    
    // Observe all cards and sections
    const elementsToObserve = document.querySelectorAll('.org-card, .company-card, .visi-box, .misi-box, .enhanced-section');
    elementsToObserve.forEach(el => {
        // Set initial state
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s ease';
        
        observer.observe(el);
    });
}

function initInteractiveEffects() {
    // Enhanced hover effects for cards
    const cards = document.querySelectorAll('.org-card, .company-card, .post, .entry');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
            this.style.boxShadow = '0 20px 40px rgba(0,0,0,0.15)';
            this.style.zIndex = '10';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 10px 30px rgba(0,0,0,0.1)';
            this.style.zIndex = '1';
        });
    });
    
    // Add floating animation to images
    const images = document.querySelectorAll('.org-photo, .company-logo img, .wp-post-image');
    images.forEach(img => {
        img.style.animation = 'float 3s ease-in-out infinite';
    });
}

function addBackToTopButton() {
    const backToTopButton = document.createElement('button');
    backToTopButton.innerHTML = '↑';
    backToTopButton.className = 'back-to-top-btn';
    backToTopButton.style.cssText = `
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        transform: translateY(100px);
        transition: all 0.3s ease;
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: bold;
    `;
    
    document.body.appendChild(backToTopButton);
    
    // Show/hide based on scroll
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopButton.style.transform = 'translateY(0)';
        } else {
            backToTopButton.style.transform = 'translateY(100px)';
        }
    });
    
    // Scroll to top functionality
    backToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Hover effect
    backToTopButton.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-5px) scale(1.1)';
        this.style.boxShadow = '0 6px 20px rgba(102, 126, 234, 0.4)';
    });
    
    backToTopButton.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
        this.style.boxShadow = '0 4px 12px rgba(102, 126, 234, 0.3)';
    });
}

function initFormEnhancements() {
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        const inputs = form.querySelectorAll('input, textarea, select');
        
        inputs.forEach(input => {
            // Enhanced focus effects
            input.addEventListener('focus', function() {
                this.style.borderColor = '#667eea';
                this.style.boxShadow = '0 0 20px rgba(102, 126, 234, 0.2)';
                this.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.style.borderColor = '#ddd';
                this.style.boxShadow = 'none';
                this.style.transform = 'scale(1)';
            });
        });
    });
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    .animate-in {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }
    
    .back-to-top-btn:hover {
        background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%) !important;
    }
`;
document.head.appendChild(style);
