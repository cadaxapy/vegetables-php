@extends('layouts.app') @section('content')
<script type="application/javascript">
    function removeCart(button) {
        $button = $(button);
        let cartId = $button.data("id");
        $button.val(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
        $.ajax({
            url: `/cart/${cartId}`,
            type: "DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                $button.closest('.cart-item').remove();
            },
            error: function(error) {
                alert(error);
            }
        });
    }
    function changeQuantity(button) {
        $button = $(button);

        let cartId = $button.data("id");

        $input = $button.siblings('input');
        previousCount = Number.parseInt($input.val());
        if($button.data('type') == "decrement") {
            newCount = $input.val(previousCount - 1);
        } else {
            newCount = $input.val(previousCount + 1);
        }
        $.ajax({
            url: `/cart/${cartId}`,
            type: "PUT",
            data: {
                "count": newCount.val(),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                console.log("success");
            },
            error: function(error) {
                alert(error);
            }
        });
        console.log();
    }
</script>

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
    <div class="d-flex justify-content-between">
        <a href="/"><h3>Назад</h3></a>
    </div>
    <ul class="list-group">
        @foreach($carts as $cart)
        <div
            class="cart-item d-flex flex-column justify-content-center align-items-center"
        >
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h4 class="card-title">
                        {{ $cart -> vegetable -> name }}
                    </h4>
                    <p class="card-text">
                        {{ $cart -> vegetable -> description }}
                    </p>
                    <div
                        class="d-flex justify-content-between align-items-center"
                    >
                        <div class="d-flex">
                            <button data-type="decrement" data-id="{{$cart->id}}" onclick="changeQuantity(this)" class="btn btn-danger">-</button>
                            <input class="w-25" value="{{ $cart -> count }}"></input>
                            <button data-type="increment" data-id="{{$cart->id}}" onclick="changeQuantity(this)" class="btn btn-primary">+</button>   
                        </div>
                        <button
                            id="removeButton"
                            onclick="removeCart(this)"
                            class="btn btn-primary"
                            data-id="{{$cart->id}}"
                        >
                            Удалить
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </ul>
</div>
@endsection
