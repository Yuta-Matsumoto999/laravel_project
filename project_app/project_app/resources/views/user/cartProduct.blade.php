@extends('layouts.user')

@section('content')
<main>
  <div class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <img src="" alt="" class=".img-fluid rounded text-center">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h3>小計  (税抜) : {{ $cart->products->price }}円</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-3 text-left">
          <h2>商品名</h2>
        </div>
        <div class="col-9 text-left">
          <h2>{{ $cart->products->name }}</h2>
        </div>
      </div>
      <div class="container border border-primary rounded">
        <div class="row">
          <div class="col-12 text-left">
            <h5>商品詳細</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <h5>{{ $cart->products->content }}</h5>
          </div>
        </div>
      </div>
          {!! Form::open(['route' => ['sale.update.cart', $cart->id], 'method' => 'PUT']) !!}
            <div class="form-group col-3 @if($errors->has('quentity')) has-error @endif">
              <label for="quentity1">数量</label>
              {!! Form::text('quentity', $cart->quentity, ['class' => 'form-control form-control-sm', 'id' => 'quentity1', 'placeholder' => '1']) !!}
              <span class="help-block">{{ $errors->first('quentity') }}</span>
            </div>
            <div class="form-group text-center">
              {!! Form::submit('変更する', ['class' => 'btn btn-primary']) !!}
            </div>
          {!! Form::close() !!}
    </div>
  </div>
</main>
@endsection