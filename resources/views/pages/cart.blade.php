@extends('layouts.pages')

@section('title')
Shopping Cart
@endsection

@section('page', 'Shopping Cart')

@section('content')
@foreach ($config as $item)
<div class="breadcumb-wrapper" data-bg-src="{{ asset('galeries/config/breadcrumb/' . $item->breadcrumb) }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">@yield('page')</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ url('/') }}">Homepage</a></li>
                <li>@yield('page')</li>
            </ul>
        </div>
    </div>
</div>
@endforeach

<!--==============================
Cart Area
==============================-->
<div class="th-cart-wrapper space-top space-extra-bottom">
    <div class="container">

        @if(session()->has('success'))
        <div class="woocommerce-notices-wrapper">
            <div class="woocommerce-message">{{ session('success') }}</div>
        </div>
        @endif

        <div class="woocommerce-cart-form">
            {{-- @csrf
            @method('PUT') --}}
            <table class="cart_table">
                <thead>
                    <tr>
                        <th class="cart-col-image">Gambar</th>
                        <th class="cart-col-productname">Nama Produk</th>
                        <th class="cart-col-quantity">Kuantitas</th>
                        <th class="cart-col-total">Total</th>
                        <th class="cart-col-remove">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $item)
                    <tr class="cart_item">
                        <td data-title="Product">
                            <a class="cart-productimage" href="{{ route('detail.product', $item->product->slug) }}"><img
                                    width="91" height="91" src="{{ asset('products/'.$item->product->image) }}"
                                    alt="Image"></a>
                        </td>
                        <td data-title="Name">
                            <a class="cart-productname" href="{{ route('detail.product', $item->product->slug) }}">{{
                                $item->product->title }}</a>
                        </td>
                        <td data-title="Quantity">
                            <div class="quantity">
                                <form class="update-form" id="update-form-{{ $item->id }}"
                                    action="{{ route('cart.update', $item->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <select name="quantity" class="quantity" data-item="{{ $item->id }}"
                                        onchange="this.form.submit()">
                                        @for ($i = 1; $i <= 5; $i++) <option value="{{ $i }}" {{ $item->quantity == $i ?
                                            'selected' : '' }}>
                                            {{ $i }} kg
                                            </option>
                                            @endfor
                                    </select>
                                </form>
                            </div>
                        </td>
                        <td data-title="Total">
                            <div class="total">
                                <p class="total-item" data-unit-price="{{ $item->product->price }}">
                                    IDR.{{ $item->product->price * $item->quantity }}-,
                                </p>
                            </div>
                        </td>
                        <td data-title="Remove">
                            <form id="remove-form-{{ $item->id }}" action="{{ route('cart.remove', $item->id) }}"
                                method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" style="border: 0; background-color: white;"
                                    class="remove-btn remove" data-product-id="{{ $item->id }}">
                                    <i class="fal fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6" class="actions">
                            {{-- <button type="button" class="th-btn update-btn">Update</button> --}}
                            <a href="{{ url('pages/shop') }}" class="th-btn">Continue Shopping</a>
                            @if ($carts->isNotEmpty())
                            <button id="orderWhatsAppBtn" class="th-btn">Order via WhatsApp</button>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Update cart item when select value changes
        $('.quantity-select').on('change', function () {
            var select = $(this);
            var form = select.closest('form');
            var quantity = select.val();
            var unitPrice = form.find('.total-item').data('unit-price');

            // Make an AJAX request to update the cart item
            $.ajax({
                type: 'PUT',
                url: form.attr('action'),
                data: {
                    _token: form.find('[name="_token"]').val(),
                    _method: form.find('[name="_method"]').val(),
                    quantity: quantity,
                },
                success: function(response) {
                    // Handle success, e.g., show a success message
                    console.log(response);

                    // Update the total price dynamically
                    var totalPrice = unitPrice * quantity;
                    form.find('.total-item').text("IDR." + totalPrice + "-");
                },
                error: function(error) {
                    // Handle error, e.g., show an error message
                    console.error(error);
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

    // Remove button
    document.querySelectorAll('.remove-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            var productId = button.getAttribute('data-product-id');
            var form = document.getElementById('remove-form-' + productId);
            form.submit();
        });
    });

    function updateCartItem(select) {
        var productId = select.getAttribute('data-item');
        var form = document.getElementById('update-form-' + productId);

        if (form) {
            form.submit();
        } else {
            console.error("Form not found for product with id: " + productId);
        }
    }

    // Order via WhatsApp button
    var orderWhatsAppBtn = document.getElementById('orderWhatsAppBtn');
    if (orderWhatsAppBtn) {
        orderWhatsAppBtn.addEventListener('click', function () {
            // Make an AJAX request to get the total price
            $.ajax({
                type: 'GET',
                url: '{{ route('cart.total') }}', // Adjust this route to match your actual route
                success: function(response) {
                    // Create WhatsApp message based on total price
                    var whatsappMessage = "Halo Min, Saya mau pesan...\n\n*Nota Pembelian*\n";

                    @foreach ($carts as $item)
                        whatsappMessage += `Nama Produk: {{ $item->product->title }}\n`;
                        whatsappMessage += `Kuantitas: {{ $item->quantity }} kg\n\n`;
                    @endforeach

                    whatsappMessage += `Total Harga untuk Semua Produk: IDR.${response.totalPrice}-,\n\n`;
                    whatsappMessage += "Apakah masih ada?";

                    // Replace the phone number with the actual phone number
                    var phoneNumber = "{{ $contacts->first()->telp }}"; // Use the first contact's phone number

                    // Generate WhatsApp URL
                    var encodedMessage = encodeURIComponent(whatsappMessage);
                    var whatsappURL = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;

                    // Open WhatsApp in a new tab
                    window.open(whatsappURL, '_blank');
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    }

});

</script>
@endsection