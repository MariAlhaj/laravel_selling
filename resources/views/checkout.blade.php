<!DOCTYPE html>
<html>
<head>
    <title>Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('payment.process') }}" method="POST" id="payment-form">
        @csrf
        <label for="amount">Amount:</label>
        <input type="number" name="amount" min="0.50" step="0.01" required>
        <button id="submit-button">Pay</button>
    </form>

    <script>
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const { error, token } = await stripe.createToken();
            if (error) {
                console.error(error.message);
            } else {
                const input = document.createElement('input');
                input.setAttribute('type', 'hidden');
                input.setAttribute('name', 'stripeToken');
                input.setAttribute('value', token.id);
                form.appendChild(input);
                form.submit();
            }
        });
    </script>
</body>
</html>
