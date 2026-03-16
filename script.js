document.addEventListener('DOMContentLoaded', function() {
    const seatsInput = document.getElementById('seats');
    const totalFeeSpan = document.getElementById('total-fee');
    const discountMessage = document.getElementById('discount-message');
    const errorMessage = document.getElementById('error-message');
    const classTypeSelect = document.getElementById('class-type');
    const finalAmountSpan = document.getElementById('final-amount');
    const confirmCheckbox = document.getElementById('confirm');
    const submitBtn = document.getElementById('submit-btn');

    const feePerSeat = 1000;
    const discountLimit = 5000;
    const onlineFee = 100;
    const campusFee = 250;

    function calculateTotalFee() {
        const seats = parseInt(seatsInput.value);
        if (seats <= 0) {
            errorMessage.style.display = 'block';
            seatsInput.value = 1;
            return feePerSeat;
        } else {
            errorMessage.style.display = 'none';
        }
        const total = seats * feePerSeat;
        totalFeeSpan.textContent = total;
        if (total > discountLimit) {
            discountMessage.style.display = 'block';
        } else {
            discountMessage.style.display = 'none';
        }
        updateFinalAmount();
        return total;
    }

    function updateFinalAmount() {
        const totalFee = parseInt(totalFeeSpan.textContent);
        const classType = classTypeSelect.value;
        let extraFee = 0;
        if (classType === 'online') {
            extraFee = onlineFee;
        } else if (classType === 'campus') {
            extraFee = campusFee;
        }
        const final = totalFee + extraFee;
        finalAmountSpan.textContent = final;
    }

    seatsInput.addEventListener('input', calculateTotalFee);
    classTypeSelect.addEventListener('change', updateFinalAmount);

    confirmCheckbox.addEventListener('change', function() {
        if (this.checked) {
            submitBtn.style.display = 'block';
        } else {
            submitBtn.style.display = 'none';
        }
    });

    calculateTotalFee();
    updateFinalAmount();
});