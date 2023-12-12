@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-5 show-img">
        @if ($productData->image)
            <img src="{{ asset($productData->image) }}" class="w-100 img-fluid">
        @else
            <img src="{{ asset('img/NOIMAGE.png')}}" class="w-100 img-fluid">
        @endif
    </div>
    <div class="col-md-6 d-flex flex-column">
        <h2 class="mb-3">{{ $productData->name }}</h2>
        <p class="h3 text-primary mb-3">￥{{ number_format($productData->price) }}</p>
        <p class="mb-2">在庫: {{ $productData->stock }}</p>

        <form action="{{ route('cart.add', $productData->id) }}" method="post" id="addToCartForm">
            @csrf
            <button type="submit" class="btn btn-primary btn-sm mb-2" style="width: 120px;">カートに追加</button>
        </form>

        <button class="btn btn-primary btn-sm mb-3" onclick="location.href='./{{ $productData->id }}/purchase'" style="width: 120px;">購入する</button>

        <p class="text-muted" style="max-width: 80%;">{!! nl2br($productData->description) !!}</p>
    </div>
</div>

<!-- モーダル -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">カートに追加しました</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                カートに商品が追加されました。
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                <a href="/cart" class="btn btn-primary">カートに移動</a>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#addToCartForm').submit(function(e) {
            e.preventDefault();

            // フォームのデータを非同期で送信
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    // モーダルを手動で表示
                    $('#cartModal').modal('show');
                },
                error: function(error) {
                    console.log(error);
                    // エラー処理を追加する場合はここに記述
                }
            });
        });
    });
</script>

@endsection
