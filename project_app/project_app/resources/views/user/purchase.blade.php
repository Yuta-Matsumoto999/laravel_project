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
                  <td>{{ $cart->products->price }}円 +税</td>
                </tr>
                <tr>
                  <th>数量</th>
                  <td>{{ $cart->quentity }} 個</td>
                </tr>
              </tbody>
            </table>
            {{ Form::hidden('product_id', $cart->products->id) }}
          </div>
          <div class="col-md-5">
            <a href="{{ route('sale.show.cart.product', $cart->id) }}"><img src="img/coffee.jpg" alt="コーヒー" class="img-fluid"></a> 
          </div>
        </div>
        <div class="row">
          <div class="col text-right">
            {!! Form::open(['route' => ['sale.destroy.cart', $cart->id], 'method' => 'DELETE']) !!}
              {!! Form::submit('カートから削除', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
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
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name1">お名前</label>
              {!! Form::text('name', $users->name, ['class' => 'form-control', 'id' => 'name1', 'placeholder' => 'お名前', 'readonly']) !!}
            </div>
            <div class="form-group col-md-6">
              <label for="email1">メールアドレス</label>
              {!! Form::email('email', $users->email, ['class' => 'form-control', 'id' => 'email1', 'placeholder' => 'example@gmail.com', 'readonly']) !!}
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 @if($errors->has('address_num')) has-error @endif">
              <label for="address_num1">郵便番号</label>
              {!! Form::text('address_num', $users->address_num, ['class' => 'form-control', 'id' => 'address_num1', 'placeholder' => '1234567']) !!}
              <span class="help-block">{{ $errors->first('address_num') }}</span>
            </div>
            <div class="form-group col-md-9 @if($errors->has('address')) has-error @endif">
              <label for="address1">住所</label>
              {!! Form::text('address', $users->address, ['class' => 'form-control', 'id' => 'address1', 'placeholder' => 'ご住所']) !!}
              <span class="help-block">{{ $errors->first('address') }}</span>
            </div>
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