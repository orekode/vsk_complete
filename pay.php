<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once './components/head.php'; ?>
        <link rel="stylesheet" href="./styles/courses.css">
        <link rel="stylesheet" href="./styles/contact.css">
    </head>
    
    <body></body>
    
    <script src="https://js.paystack.co/v1/inline.js"></script>
    
    <script>
        function initiatePayment(callback) {
            
            plan_map = {
                "pro": 2300,
                "enterprice": 5999,
            };
                
            var handler = PaystackPop.setup({
                key: 'pk_test_9c36a8f1629bab4339b8fced7c3f999d4456e5ac', // Replace with your Paystack public key
                email: '<?php echo $_GET['email']; ?>', // Customer's email
                amount: plan_map['<?php echo $_GET['plan']; ?>'], // Amount in kobo (e.g., 10000 for ₦100.00)
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
        
        initiatePayment(() => {
            location.href = './congratulation.php';
        });
    </script>

</html>