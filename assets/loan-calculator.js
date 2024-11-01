document.addEventListener('DOMContentLoaded', function() {
    // Helper function to format values as currency with thousand separators
    function formatCurrency(value) {
        return "$" + parseFloat(value).toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    // Amortized Loan Calculation
    function calculateAmortizedLoan() {
        var loanAmount = parseFloat(document.getElementById('wpapps-loan-amount-amortized').value) || 0;
        var annualInterestRate = parseFloat(document.getElementById('wpapps-interest-rate-amortized').value) || 0;
        var years = parseInt(document.getElementById('wpapps-loan-term-years-amortized').value) || 0;
        var months = parseInt(document.getElementById('wpapps-loan-term-months-amortized').value) || 0;
        var totalMonths = (years * 12) + months;

        var payment = 0;
        var totalPayment = 0;
        var totalInterest = 0;

        if (loanAmount > 0 && annualInterestRate >= 0 && totalMonths > 0) {
            var monthlyInterestRate = (annualInterestRate / 100) / 12;
            payment = (loanAmount * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, totalMonths)) / 
                      (Math.pow(1 + monthlyInterestRate, totalMonths) - 1);
            totalPayment = payment * totalMonths;
            totalInterest = totalPayment - loanAmount;

            // Update the UI with formatted currency values
            document.getElementById('wpapps-amortized-total').textContent = formatCurrency(totalPayment);
            document.getElementById('wpapps-amortized-principal').textContent = formatCurrency(loanAmount);
            document.getElementById('wpapps-amortized-interest').textContent = formatCurrency(totalInterest);

            // Show the details section for Amortized Loan
            document.getElementById('wpapps-amortized-details').style.display = 'block';

            // Update the payment textbox with the monthly payment
            document.getElementById('wpapps-payment-amount-amortized').value = formatCurrency(payment);
        } else {
            // Hide the details section if calculation is not possible
            document.getElementById('wpapps-amortized-details').style.display = 'none';
        }
    }

    // Deferred Payment Loan Calculation
    function calculateDeferredPaymentLoan() {
        var loanAmount = parseFloat(document.getElementById('wpapps-loan-amount-deferred').value) || 0;
        var annualInterestRate = parseFloat(document.getElementById('wpapps-interest-rate-deferred').value) || 0;
        var years = parseInt(document.getElementById('wpapps-loan-term-years-deferred').value) || 0;
        var months = parseInt(document.getElementById('wpapps-loan-term-months-deferred').value) || 0;
        var totalMonths = (years * 12) + months;

        var totalInterest = 0;
        var totalPayment = 0;

        if (loanAmount > 0 && annualInterestRate >= 0 && totalMonths > 0) {
            var monthlyInterestRate = (annualInterestRate / 100) / 12;
            totalInterest = monthlyInterestRate * loanAmount * totalMonths;
            totalPayment = loanAmount + totalInterest;

            // Update the UI with formatted currency values
            document.getElementById('wpapps-deferred-total').textContent = formatCurrency(totalPayment);
            document.getElementById('wpapps-deferred-interest').textContent = formatCurrency(totalInterest);

            // Show the details section for Deferred Loan
            document.getElementById('wpapps-deferred-details').style.display = 'block';

            // Update the payment textbox with the lump sum payment
            document.getElementById('wpapps-payment-amount-deferred').value = formatCurrency(totalPayment);
        } else {
            // Hide the details section if calculation is not possible
            document.getElementById('wpapps-deferred-details').style.display = 'none';
        }
    }

    // Combined Loan Calculation
    function calculateCombinedLoan() {
        var loanType = document.querySelector('input[name="wpapps-calculation-type-combined"]:checked').value;
        var loanAmount = parseFloat(document.getElementById('wpapps-loan-amount-combined').value) || 0;
        var annualInterestRate = parseFloat(document.getElementById('wpapps-interest-rate-combined').value) || 0;
        var years = parseInt(document.getElementById('wpapps-loan-term-years-combined').value) || 0;
        var months = parseInt(document.getElementById('wpapps-loan-term-months-combined').value) || 0;
        var totalMonths = (years * 12) + months;

        var payment = 0;
        var totalPayment = 0;
        var totalInterest = 0;

        if (loanAmount > 0 && annualInterestRate >= 0 && totalMonths > 0) {
            var monthlyInterestRate = (annualInterestRate / 100) / 12;

            if (loanType === 'monthly') {
                payment = (loanAmount * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, totalMonths)) / 
                          (Math.pow(1 + monthlyInterestRate, totalMonths) - 1);
                totalPayment = payment * totalMonths;
                totalInterest = totalPayment - loanAmount;

                // Update the Amortized details
                document.getElementById('wpapps-amortized-total-combined').textContent = formatCurrency(totalPayment);
                document.getElementById('wpapps-amortized-principal-combined').textContent = formatCurrency(loanAmount);
                document.getElementById('wpapps-amortized-interest-combined').textContent = formatCurrency(totalInterest);
                document.getElementById('wpapps-amortized-details-combined').style.display = 'block';
                document.getElementById('wpapps-deferred-details-combined').style.display = 'none';
                document.getElementById('wpapps-payment-amount-combined').value = formatCurrency(payment);


            } else if (loanType === 'lump') {
                totalInterest = monthlyInterestRate * loanAmount * totalMonths;
                totalPayment = loanAmount + totalInterest;

                // Update the Deferred details
                document.getElementById('wpapps-deferred-total-combined').textContent = formatCurrency(totalPayment);
                document.getElementById('wpapps-deferred-interest-combined').textContent = formatCurrency(totalInterest);
                document.getElementById('wpapps-deferred-details-combined').style.display = 'block';
                document.getElementById('wpapps-amortized-details-combined').style.display = 'none';
                document.getElementById('wpapps-payment-amount-combined').value = formatCurrency(totalPayment);

            }

            // Update the payment textbox with the monthly or lump sum payment
        }
    }

    // Event listeners for input changes for each calculator
    document.getElementById('wpapps-loan-amount-amortized').addEventListener('input', calculateAmortizedLoan);
    document.getElementById('wpapps-interest-rate-amortized').addEventListener('input', calculateAmortizedLoan);
    document.getElementById('wpapps-loan-term-years-amortized').addEventListener('input', calculateAmortizedLoan);
    document.getElementById('wpapps-loan-term-months-amortized').addEventListener('input', calculateAmortizedLoan);

    document.getElementById('wpapps-loan-amount-deferred').addEventListener('input', calculateDeferredPaymentLoan);
    document.getElementById('wpapps-interest-rate-deferred').addEventListener('input', calculateDeferredPaymentLoan);
    document.getElementById('wpapps-loan-term-years-deferred').addEventListener('input', calculateDeferredPaymentLoan);
    document.getElementById('wpapps-loan-term-months-deferred').addEventListener('input', calculateDeferredPaymentLoan);

    document.getElementById('wpapps-loan-amount-combined').addEventListener('input', calculateCombinedLoan);
    document.getElementById('wpapps-interest-rate-combined').addEventListener('input', calculateCombinedLoan);
    document.getElementById('wpapps-loan-term-years-combined').addEventListener('input', calculateCombinedLoan);
    document.getElementById('wpapps-loan-term-months-combined').addEventListener('input', calculateCombinedLoan);
    document.querySelectorAll('input[name="wpapps-calculation-type-combined"]').forEach(function(elem) {
        elem.addEventListener('change', calculateCombinedLoan);
    });

    // Initial calculations
    calculateAmortizedLoan();
    calculateDeferredPaymentLoan();
    calculateCombinedLoan();
});
