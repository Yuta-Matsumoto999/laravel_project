@extends('layouts.user')

@section('content')
<main>
  <div class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>購入画面</h1>
        </div>
      </div>
      @foreach ($carts as $cart)
      <div class="container border">
        <div class="row">
          <div class="col-md-7 order-md-2">
            <h4>{{ $cart->products->name }}</h4>
            <table class="table table-striped">
              <tbody>
                <tr>
                  <th>商品番号</th>
                  <td>{{ $cart->products->id }}</td>
                </tr>
                <tr>
                  <th>モデル</th>
                  <td>{{ $cart->products->model }}</td>
                </tr>
                <tr>
                  <th>掲載日</th>
                  <td>{{ $cart->products->updated_at->format('Y/m/d') }}</td>
                </tr>
                <tr>
                  <th>PRICE</th>
                  <td>{{ $cart->price }}円 +税</td>
                </tr>
                <tr>
                  <th>数量</th>
                  <td>{{ $cart->quentity }} 個</td>
                </tr>
                <tr>
                  <th>小計</th>
                  <td>{{ $cart->sumPrice }} 円 (税抜)</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-5">
            <a href="{{ route('sale.show.cart.product', $cart->id) }}"><img src="img/{{ $cart->products->photo }}" alt="" class="img-fluid"></a> 
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12 text-right">
        <h5 class="product-price">小計   {{ $sumPrice }}円</h5>
      </div>
      <div class="col-12 text-right">
        <h5 class="product-price">消費税   {{ round($taxPrice) }}円</h5>
      </div>
      <div class="col-12 text-right">
        <h5 class="product-price">送料   無料</h5>
      </div>
      <div class="col-12 text-right">
        <h3 class="product-price">合計金額   {{ round($totalPrice) }}円</h3>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3>お客様情報</h3>
      </div>
      <div class="col-12">
        {!! Form::open(['route' => ['sale.store.cart.purchase']]) !!}
          <div class="form-group">
            <label for="name1">お名前</label>
            {!! Form::text('name', $users->name, ['class' => 'form-control', 'id' => 'name1', 'placeholder' => 'お名前', 'readonly']) !!}
          </div>
          <div class="form-group">
            <label for="email1">メールアドレス</label>
            {!! Form::email('email', $users->email, ['class' => 'form-control', 'id' => 'email1', 'placeholder' => 'example@gmail.com', 'readonly']) !!}
          </div>
        <div class="text-center">
          {!! Form::submit('購入する', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</main>
@endsection