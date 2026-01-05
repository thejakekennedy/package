document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('sameAsDelivery');
    
    // Mapping delivery fields to billing fields
    const fields = [
        { del: 'del_street', bill: 'bill_street' },
        { del: 'del_city', bill: 'bill_city' },
        { del: 'del_state', bill: 'bill_state' },
        { del: 'del_country', bill: 'bill_country' },
        { del: 'del_zip', bill: 'bill_zip' }
    ];

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            // Copy values from Delivery to Billing
            fields.forEach(field => {
                const deliveryVal = document.getElementById(field.del).value;
                const billingInput = document.getElementById(field.bill);
                billingInput.value = deliveryVal;
                // Optional: Make billing read-only when checked
                billingInput.setAttribute('readonly', true);
            });
        } else {
            // Clear values and remove read-only
            fields.forEach(field => {
                const billingInput = document.getElementById(field.bill);
                billingInput.value = '';
                billingInput.removeAttribute('readonly');
            });
        }
    });
});