// Set footer year dynamically
document.getElementById('currentYear').textContent = new Date().getFullYear();

// Newsletter form submission
const newsletterForm = document.getElementById('newsletterForm');
newsletterForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const emailInput = newsletterForm.querySelector('input[type="email"]');
    alert(`Thanks for subscribing, ${emailInput.value}!`);
    emailInput.value = '';
});