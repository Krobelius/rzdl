@extends('welcome')

@section('content')
    <main>
        <section class="order-section">
            <div class="order-form">
                <h1>Заявка</h1>
                <form id="order-form" class="order-form__form" method="post" action="/">
                    <div class="alert alert-success hidden">Успешно обновили заявку</div>
                    <div class="alert alert-danger hidden">Произошла ошибка(</div>
                    <div class="order-positions">
                        <div class="order-positions-header">
                            <h2>Товары</h2>
                        </div>
                        <div class="order-positions-list">
                            @foreach(\App\Models\Order::where('userid',\Illuminate\Support\Facades\Auth::id())->get() as $order)
                                <p>{{$order->products}}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="order-comment">
                        <div class="order-comment-header">
                            <h2>Комментарий</h2>
                        </div>
                        <div class="order-comment-field">
                            <textarea name="order-comment-ff" class="order-comment__area" id="comment-area"></textarea>
                        </div>
                    </div>
                    <div class="order-last-info">
                        <button class="order-complete" type="submit">Отправить заявку</button>
                        <span>Подробная информация заявки
                            оговаривается с индивидуально</span>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection
