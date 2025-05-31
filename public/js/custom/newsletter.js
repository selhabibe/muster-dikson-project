/* Unified Newsletter JavaScript */
/* This file contains all newsletter-related functionality used across the website */

document.addEventListener('DOMContentLoaded', function() {
    // Handle all newsletter forms
    document.querySelectorAll('[id$="-newsletter-form"]').forEach(newsletterForm => {
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                const submitButton = newsletterForm.querySelector('[id$="-newsletter-submit"]');
                const emailInput = newsletterForm.querySelector('[id$="-newsletter-email"]');
                const email = emailInput.value.trim();

                // Validate email
                if (!email) {
                    alert('Veuillez entrer votre adresse email.');
                    emailInput.focus();
                    return false;
                }

                // Show loading state
                submitButton.innerHTML = 'Envoi en cours...';
                submitButton.disabled = true;

                // Create form data
                const formData = new FormData(newsletterForm);

                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                // Make sure we have the CSRF token
                if (!csrfToken) {
                    console.error('CSRF token not found');
                    // Fall back to traditional form submission if no CSRF token
                    newsletterForm.submit();
                    return false;
                }

                // Submit form using fetch API
                fetch(newsletterForm.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    credentials: 'same-origin'
                })
                .then(response => {
                    // Check if the response is JSON
                    const contentType = response.headers.get('content-type');
                    if (contentType && contentType.includes('application/json')) {
                        return response.json();
                    } else {
                        // If not JSON, reload the page to show the server's response
                        window.location.reload();
                        throw new Error('Not JSON response');
                    }
                })
                .then(data => {
                    // Create success message
                    const messageContainer = document.createElement('div');

                    if (data.success) {
                        // Show success message
                        const welcomeMessage = document.createElement('div');
                        welcomeMessage.className = 'newsletter-message mb-3 text-white';
                        
                        // Get the brand name from form source or use default
                        const formSource = newsletterForm.querySelector('input[name="form_source"]')?.value || '';
                        let brandName = 'Muster & Dikson';
                        
                        if (formSource.includes('muster')) {
                            brandName = 'Muster Beauty Tech';
                        } else if (formSource.includes('dikson')) {
                            brandName = 'Dikson';
                        }
                        
                        welcomeMessage.innerHTML = `<p class="mb-0"><i class="fas fa-heart"></i> Bienvenue dans l'univers ${brandName} !</p>`;

                        const successMessage = document.createElement('div');
                        successMessage.className = 'alert alert-success mt-3';
                        successMessage.textContent = data.message || 'Merci de vous être inscrit à notre newsletter !';

                        // Clear form and show messages
                        newsletterForm.innerHTML = '';
                        newsletterForm.appendChild(welcomeMessage);
                        newsletterForm.appendChild(successMessage);
                    } else {
                        // Show error message
                        const errorMessage = document.createElement('div');
                        errorMessage.className = 'alert alert-danger mt-3';
                        errorMessage.textContent = data.message || 'Une erreur est survenue. Veuillez réessayer.';

                        // Insert error message before the input
                        const inputContainer = emailInput.parentElement;
                        newsletterForm.insertBefore(errorMessage, inputContainer);

                        // Reset button
                        submitButton.innerHTML = 'S\'abonner <i class="fas fa-paper-plane"></i>';
                        submitButton.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    submitButton.innerHTML = 'S\'abonner <i class="fas fa-paper-plane"></i>';
                    submitButton.disabled = false;

                    // Show error message
                    const errorMessage = document.createElement('div');
                    errorMessage.className = 'alert alert-danger mt-3';
                    errorMessage.textContent = 'Une erreur est survenue. Veuillez réessayer.';

                    // Insert error message before the input
                    const inputContainer = emailInput.parentElement;
                    newsletterForm.insertBefore(errorMessage, inputContainer);
                });

                return false;
            });
        }
    });
});
