

function make_payment(e) {
    e.preventDefault();
    
    plan_map = {
        "pro": 2300,
        "enterprice": 5999,
    };
    
    plan = document.querySelector(".plan-select").value;
    email = document.querySelector(".email-input").value;
    
    if(plan.replaceAll("click to choose", "").replaceAll(" ", "") == "" || plan == "free") {
        document.querySelector('form').submit();
        return;
    }
    
    initiatePayment(() => document.querySelector('form').submit());
    
    
}

function initiatePayment(callback) {
        
    var handler = PaystackPop.setup({
        key: 'pk_test_9c36a8f1629bab4339b8fced7c3f999d4456e5ac', // Replace with your Paystack public key
        email, // Customer's email
        amount: plan_map[plan], // Amount in kobo (e.g., 10000 for ₦100.00)
        currency: 'GHS', // Currency (e.g., NGN for Nigerian Naira)
        callback: function(response) {
            // Handle successful payment
            callback();
        },
        onClose: function() {
            // Handle payment modal closure
            // alert('Payment modal closed without completing payment.');
        }
    });
    
    handler.openIframe();
}

