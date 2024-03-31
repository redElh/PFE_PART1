<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Order Placed</title>
</head>
<body>
    <h1>New Order Placed</h1>
    
    <p>Hello admin,</p>
    
    <p>New order has been successfully placed by {{ $userName }}. Here are the details:</p>
    
    <ul>
        @foreach ($cartItems as $item)
            <li>
                Product Name: {{ $item['name'] }}<br>
                Price: ${{ $item['price'] }}<br>
                Quantity: {{ $item['quantity'] }}
            </li>
        @endforeach
    </ul>
    
    <p>Contact the user via its email: {{ $userEmail }} or its phone number: {{ $userPhone }}.</p>
    
</body>
</html>
