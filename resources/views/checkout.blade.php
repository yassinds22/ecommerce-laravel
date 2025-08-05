<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <button id="checkout-button">Pay Now</button>

    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
        
        document.getElementById('checkout-button').addEventListener('click', async () => {
            try {
                const response = await fetch("{{ route('create-session') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                const session = await response.json();
                await stripe.redirectToCheckout({ sessionId: session.id });
                
            } catch (error) {
                console.error('Error:', error);
            }
        });
    </script>
</body>
</html>