/**
 * Modern Cart Drawer Functionality
 * Provides real-time cart updates and Shopify-style cart behavior
 */

class CartDrawer {
    constructor() {
        this.drawer = document.getElementById('cart-drawer');
        this.overlay = document.getElementById('cart-drawer-overlay');
        this.closeBtn = document.getElementById('cart-drawer-close');
        this.cartTrigger = document.getElementById('cart-trigger');
        this.cartIcon = document.getElementById('cart-icon');
        this.headerCartCount = document.getElementById('header-cart-count');
        this.headerCartTotal = document.getElementById('header-cart-total');
        this.drawerCartTotal = document.getElementById('drawer-cart-total');
        this.cartItemsList = document.getElementById('cart-items-list');
        this.cartEmptyState = document.getElementById('cart-empty-state');
        this.cartDrawerFooter = document.getElementById('cart-drawer-footer');
        this.successToast = document.getElementById('success-toast');

        this.init();
    }

    init() {
        this.bindEvents();
        this.bindCartButtons();
        this.loadCartData();
    }

    bindEvents() {
        // Cart trigger click
        if (this.cartTrigger) {
            this.cartTrigger.addEventListener('click', (e) => {
                e.preventDefault();
                this.openDrawer();
            });
        }

        // Close drawer events
        if (this.closeBtn) {
            this.closeBtn.addEventListener('click', () => this.closeDrawer());
        }

        if (this.overlay) {
            this.overlay.addEventListener('click', () => this.closeDrawer());
        }

        // ESC key to close drawer
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.drawer.classList.contains('active')) {
                this.closeDrawer();
            }
        });
    }

    bindCartButtons() {
        // Handle all cart buttons on the page
        document.querySelectorAll('.btn-cart').forEach(button => {
            button.addEventListener('click', async (e) => {
                e.preventDefault();

                const productId = button.getAttribute('data-product-id');
                const quantity = parseInt(button.getAttribute('data-quantity')) || 1;
                const originalIcon = button.innerHTML;

                // Show loading state
                button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                button.disabled = true;

                try {
                    // Use the cart drawer's add to cart method
                    const success = await this.addToCart(productId, quantity);

                    if (success) {
                        // Show success state
                        button.innerHTML = '<i class="fas fa-check"></i>';
                        button.style.backgroundColor = '#28a745';

                        // Reset button after 2 seconds
                        setTimeout(() => {
                            button.innerHTML = originalIcon;
                            button.disabled = false;
                            button.style.backgroundColor = '';
                        }, 2000);
                    } else {
                        throw new Error('Failed to add to cart');
                    }
                } catch (error) {
                    console.error('Error:', error);

                    // Show error state
                    button.innerHTML = '<i class="fas fa-times"></i>';
                    button.style.backgroundColor = '#dc3545';

                    // Reset button after 2 seconds
                    setTimeout(() => {
                        button.innerHTML = originalIcon;
                        button.disabled = false;
                        button.style.backgroundColor = '';
                    }, 2000);
                }
            });
        });
    }

    openDrawer() {
        this.loadCartData();
        this.drawer.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    closeDrawer() {
        this.drawer.classList.remove('active');
        document.body.style.overflow = '';
    }

    async loadCartData() {
        try {
            const response = await fetch('/cart/data');
            const data = await response.json();

            if (data.success) {
                this.updateCartDisplay(data);
            }
        } catch (error) {
            console.error('Error loading cart data:', error);
        }
    }

    updateCartDisplay(cartData) {
        // Update header cart info
        if (this.headerCartCount) {
            this.headerCartCount.textContent = cartData.cart_count;
        }

        if (this.headerCartTotal) {
            this.headerCartTotal.textContent = `${cartData.cart_total.toFixed(2)} MAD`;
        }

        if (this.drawerCartTotal) {
            this.drawerCartTotal.textContent = `${cartData.cart_total.toFixed(2)} MAD`;
        }

        // Update cart items in drawer
        if (cartData.cart_items.length === 0) {
            this.showEmptyState();
        } else {
            this.showCartItems(cartData.cart_items);
        }
    }

    showEmptyState() {
        if (this.cartEmptyState) {
            this.cartEmptyState.style.display = 'block';
        }
        if (this.cartItemsList) {
            this.cartItemsList.style.display = 'none';
        }
        if (this.cartDrawerFooter) {
            this.cartDrawerFooter.style.display = 'none';
        }
    }

    showCartItems(items) {
        if (this.cartEmptyState) {
            this.cartEmptyState.style.display = 'none';
        }
        if (this.cartItemsList) {
            this.cartItemsList.style.display = 'block';
        }
        if (this.cartDrawerFooter) {
            this.cartDrawerFooter.style.display = 'block';
        }

        // Render cart items
        if (this.cartItemsList) {
            this.cartItemsList.innerHTML = items.map(item => this.renderCartItem(item)).join('');

            // Bind delete buttons
            this.bindDeleteButtons();
        }
    }

    renderCartItem(item) {
        const imageUrl = item.image || 'https://i.makeup.fr/i/i4/i4dfmpe8rxkj.png';

        return `
            <div class="cart-item" data-item-id="${item.id}">
                <div class="cart-item-image">
                    <img src="${imageUrl}" alt="${item.name}" loading="lazy">
                </div>
                <div class="cart-item-details">
                    <div class="cart-item-name">${item.name}</div>
                    <div class="cart-item-meta">
                        <span class="cart-item-quantity">Qté: ${item.quantity}</span>
                        <span class="cart-item-price">${item.subtotal.toFixed(2)} MAD</span>
                    </div>
                </div>
                <div class="cart-item-actions">
                    <button class="cart-item-remove" data-item-id="${item.id}" title="Supprimer">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>
        `;
    }

    async addToCart(productId, quantity) {
        try {
            const response = await fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity
                })
            });

            const data = await response.json();

            if (data.success) {
                // Animate cart icon
                this.animateCartIcon();

                // Show success toast with product name
                this.showSuccessToast(data.product_name);

                // Update cart display immediately with returned data
                if (data.cart_count !== undefined) {
                    this.updateHeaderCartInfo(data.cart_count, data.cart_total);
                }

                // Load full cart data for drawer
                await this.loadCartData();

                // Open cart drawer after a short delay
                setTimeout(() => {
                    this.openDrawer();
                }, 500);

                return true;
            }

            return false;
        } catch (error) {
            console.error('Error adding to cart:', error);
            return false;
        }
    }

    animateCartIcon() {
        if (this.cartIcon) {
            this.cartIcon.classList.add('bounce');
            setTimeout(() => {
                this.cartIcon.classList.remove('bounce');
            }, 600);
        }

        if (this.headerCartCount) {
            this.headerCartCount.classList.add('pulse');
            setTimeout(() => {
                this.headerCartCount.classList.remove('pulse');
            }, 600);
        }
    }

    updateHeaderCartInfo(count, total) {
        if (this.headerCartCount) {
            this.headerCartCount.textContent = count;
        }

        if (this.headerCartTotal) {
            this.headerCartTotal.textContent = `${total.toFixed(2)} MAD`;
        }
    }

    bindDeleteButtons() {
        const deleteButtons = this.cartItemsList.querySelectorAll('.cart-item-remove');
        deleteButtons.forEach(button => {
            button.addEventListener('click', async (e) => {
                e.preventDefault();
                const itemId = button.getAttribute('data-item-id');
                await this.removeFromCart(itemId, button);
            });
        });
    }

    async removeFromCart(itemId, buttonElement) {
        try {
            // Show loading state on button
            const originalContent = buttonElement.innerHTML;
            buttonElement.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            buttonElement.disabled = true;

            const response = await fetch(`/cart/item/${itemId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            const data = await response.json();

            if (data.success) {
                // Update header cart info immediately
                this.updateHeaderCartInfo(data.cart_count, data.cart_total);

                // Show success toast
                this.showSuccessToast(`${data.product_name} supprimé du panier!`, 'success');

                // Remove item from DOM with animation
                const cartItem = buttonElement.closest('.cart-item');
                cartItem.style.transform = 'translateX(-100%)';
                cartItem.style.opacity = '0';

                setTimeout(() => {
                    // Reload cart data to refresh the entire list
                    this.loadCartData();
                }, 300);

            } else {
                throw new Error(data.message || 'Failed to remove item');
            }
        } catch (error) {
            console.error('Error removing item:', error);

            // Reset button state
            buttonElement.innerHTML = originalContent;
            buttonElement.disabled = false;

            // Show error toast
            this.showSuccessToast('Erreur lors de la suppression', 'error');
        }
    }

    showSuccessToast(message = null, type = 'success') {
        if (this.successToast) {
            const messageElement = this.successToast.querySelector('.toast-message');
            if (messageElement && message) {
                messageElement.textContent = message;
            }

            // Update toast styling based on type
            this.successToast.className = `toast-notification ${type}`;
            this.successToast.classList.add('show');

            setTimeout(() => {
                this.successToast.classList.remove('show');
            }, 3000);
        }
    }

    // Auto-close drawer after delay
    autoCloseDrawer(delay = 5000) {
        setTimeout(() => {
            if (this.drawer.classList.contains('active')) {
                this.closeDrawer();
            }
        }, delay);
    }
}

// Initialize cart drawer when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    window.cartDrawer = new CartDrawer();
});

// Global function to add items to cart (for use in product pages)
window.addToCartGlobal = async function(productId, quantity) {
    if (window.cartDrawer) {
        return await window.cartDrawer.addToCart(productId, quantity);
    }
    return false;
};
