/* Unified Shop Cart JavaScript */
/* This file contains all cart-related functionality used across shop pages */

document.addEventListener('DOMContentLoaded', function() {
    // Handle add to cart button clicks (for individual buttons)
    document.querySelectorAll('.btn-cart').forEach(button => {
        button.addEventListener('click', async function(e) {
            e.preventDefault();

            const productId = this.getAttribute('data-product-id');
            const quantity = parseInt(this.getAttribute('data-quantity'));
            const originalIcon = this.innerHTML;

            // Show loading state
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            this.disabled = true;

            try {
                // Use global cart function for consistent behavior
                const success = await window.addToCartGlobal(productId, quantity);

                if (success) {
                    // Show success state
                    this.innerHTML = '<i class="fas fa-check"></i>';
                    this.style.backgroundColor = '#28a745';

                    // Reset button after 2 seconds
                    setTimeout(() => {
                        this.innerHTML = originalIcon;
                        this.disabled = false;
                        this.style.backgroundColor = '';
                    }, 2000);
                } else {
                    throw new Error('Failed to add to cart');
                }
            } catch (error) {
                console.error('Error:', error);

                // Show error state
                this.innerHTML = '<i class="fas fa-times"></i>';
                this.style.backgroundColor = '#dc3545';

                // Reset button after 2 seconds
                setTimeout(() => {
                    this.innerHTML = originalIcon;
                    this.disabled = false;
                    this.style.backgroundColor = '';
                }, 2000);
            }
        });
    });

    // Handle add to cart form submissions (for forms)
    document.querySelectorAll('.add-to-cart-form').forEach(form => {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const button = this.querySelector('.btn-cart');
            const originalIcon = button.innerHTML;
            const productId = this.querySelector('input[name="product_id"]').value;
            const quantity = parseInt(this.querySelector('input[name="quantity"]').value);

            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            button.disabled = true;

            try {
                // Use global cart function for consistent behavior
                const success = await window.addToCartGlobal(productId, quantity);

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
});
