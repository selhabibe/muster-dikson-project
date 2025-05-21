/**
 * Custom JavaScript for Enhanced Product Page
 */
document.addEventListener('DOMContentLoaded', function() {
    // Initialize product image gallery
    initProductGallery();
    
    // Initialize quantity controls
    initQuantityControls();
    
    // Initialize cart functionality
    initCartFunctionality();
});

/**
 * Initialize product image gallery with enhanced functionality
 */
function initProductGallery() {
    const mainCarousel = document.querySelector('.product-single-carousel');
    const thumbs = document.querySelectorAll('.product-thumb');
    const thumbUp = document.querySelector('.thumb-up');
    const thumbDown = document.querySelector('.thumb-down');
    
    if (!mainCarousel || thumbs.length === 0) return;
    
    // Click event for thumbnails
    thumbs.forEach((thumb, index) => {
        thumb.addEventListener('click', function() {
            // Update active thumbnail
            document.querySelector('.product-thumb.active').classList.remove('active');
            this.classList.add('active');
            
            // If using Owl Carousel, trigger slide change
            if (typeof $.fn.owlCarousel !== 'undefined' && $('.product-single-carousel').data('owl.carousel')) {
                $('.product-single-carousel').trigger('to.owl.carousel', [index, 300, true]);
            }
        });
    });
    
    // Thumbnail navigation buttons
    if (thumbUp && thumbDown) {
        const thumbsContainer = document.querySelector('.product-thumbs');
        let scrollPosition = 0;
        const scrollStep = 100;
        
        // Update navigation buttons state
        function updateNavButtons() {
            thumbUp.classList.toggle('disabled', scrollPosition <= 0);
            thumbDown.classList.toggle('disabled', 
                scrollPosition >= thumbsContainer.scrollWidth - thumbsContainer.clientWidth);
        }
        
        // Initial button state
        updateNavButtons();
        
        // Scroll up event
        thumbUp.addEventListener('click', function() {
            if (scrollPosition <= 0) return;
            
            scrollPosition = Math.max(0, scrollPosition - scrollStep);
            thumbsContainer.scrollTo({
                left: scrollPosition,
                behavior: 'smooth'
            });
            
            updateNavButtons();
        });
        
        // Scroll down event
        thumbDown.addEventListener('click', function() {
            if (scrollPosition >= thumbsContainer.scrollWidth - thumbsContainer.clientWidth) return;
            
            scrollPosition = Math.min(
                thumbsContainer.scrollWidth - thumbsContainer.clientWidth,
                scrollPosition + scrollStep
            );
            thumbsContainer.scrollTo({
                left: scrollPosition,
                behavior: 'smooth'
            });
            
            updateNavButtons();
        });
    }
    
    // Enhanced image zoom functionality
    const productImages = document.querySelectorAll('.product-image-main');
    
    productImages.forEach(img => {
        // If elevateZoom plugin is available, initialize it with better options
        if (typeof $.fn.elevateZoom !== 'undefined') {
            $(img).elevateZoom({
                zoomType: "inner",
                cursor: "crosshair",
                zoomWindowFadeIn: 300,
                zoomWindowFadeOut: 300,
                responsive: true,
                zoomWindowWidth: 400,
                zoomWindowHeight: 400,
                borderSize: 0
            });
        }
        
        // Add click event for lightbox if available
        img.addEventListener('click', function() {
            if (typeof $.magnificPopup !== 'undefined') {
                $.magnificPopup.open({
                    items: {
                        src: this.getAttribute('data-zoom-image') || this.src
                    },
                    type: 'image',
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true
                    }
                });
            }
        });
    });
}

/**
 * Initialize quantity controls with improved UX
 */
function initQuantityControls() {
    const quantityInput = document.getElementById('product-quantity');
    const minusBtn = document.querySelector('.quantity-minus');
    const plusBtn = document.querySelector('.quantity-plus');
    
    if (!quantityInput || !minusBtn || !plusBtn) return;
    
    // Set initial value
    quantityInput.value = quantityInput.value || 1;
    
    // Decrease quantity
    minusBtn.addEventListener('click', function() {
        let value = parseInt(quantityInput.value);
        value = Math.max(1, value - 1);
        quantityInput.value = value;
        
        // Trigger change event
        const event = new Event('change');
        quantityInput.dispatchEvent(event);
    });
    
    // Increase quantity
    plusBtn.addEventListener('click', function() {
        let value = parseInt(quantityInput.value);
        value = Math.min(parseInt(quantityInput.getAttribute('max') || 1000000), value + 1);
        quantityInput.value = value;
        
        // Trigger change event
        const event = new Event('change');
        quantityInput.dispatchEvent(event);
    });
    
    // Validate input on change
    quantityInput.addEventListener('change', function() {
        let value = parseInt(this.value);
        
        // Ensure value is a number and within range
        if (isNaN(value) || value < 1) {
            value = 1;
        } else if (value > parseInt(this.getAttribute('max') || 1000000)) {
            value = parseInt(this.getAttribute('max') || 1000000);
        }
        
        this.value = value;
    });
}

/**
 * Initialize cart functionality with improved feedback
 */
function initCartFunctionality() {
    const addToCartBtn = document.getElementById('add-to-cart-btn');
    const messageElement = document.getElementById('message');
    
    if (!addToCartBtn) return;
    
    addToCartBtn.addEventListener('click', function(e) {
        e.preventDefault();
        
        const productId = this.getAttribute('data-product-id');
        const quantity = document.getElementById('product-quantity').value;
        
        if (!productId || !quantity) {
            showMessage('Invalid product or quantity', 'error');
            return;
        }
        
        // Show loading state
        this.classList.add('loading');
        this.disabled = true;
        
        // Get CSRF token
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        // Prepare data
        const cartData = {
            product_id: productId,
            quantity: quantity,
            _token: token
        };
        
        // Send request
        fetch(addToCartBtn.getAttribute('data-action') || '/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify(cartData)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Reset button state
            addToCartBtn.classList.remove('loading');
            addToCartBtn.disabled = false;
            
            // Show success message
            if (data.success) {
                showMessage('Product added to cart successfully!', 'success');
                
                // Update cart count if available
                updateCartCount();
            } else {
                showMessage(data.message || 'Failed to add product to cart', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            
            // Reset button state
            addToCartBtn.classList.remove('loading');
            addToCartBtn.disabled = false;
            
            // Show error message
            showMessage('Failed to add product to cart. Please try again.', 'error');
        });
    });
    
    // Helper function to show messages
    function showMessage(text, type = 'success') {
        if (!messageElement) return;
        
        messageElement.textContent = text;
        messageElement.style.display = 'block';
        messageElement.style.color = type === 'success' ? 'green' : 'red';
        messageElement.style.backgroundColor = type === 'success' ? '#f0fff0' : '#fff0f0';
        messageElement.style.border = `1px solid ${type === 'success' ? '#c3e6cb' : '#f5c6cb'}`;
        
        // Hide message after 3 seconds
        setTimeout(() => {
            messageElement.style.display = 'none';
        }, 3000);
    }
    
    // Helper function to update cart count
    function updateCartCount() {
        const cartCountElement = document.querySelector('.cart-count');
        if (cartCountElement) {
            let count = parseInt(cartCountElement.textContent || '0');
            cartCountElement.textContent = count + 1;
        }
    }
}
