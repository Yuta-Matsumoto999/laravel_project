@extends('layouts.user')

@section('content')
<main>
  <div class="py-4">
    <div class="container">
      <div class="row">
        <div class="col">
          @if ($product->phpto === null)
          <div class="text-center">
            <img src="{{ asset('/logo.image/20150701073916.png') }}" alt="商品画像がありません" class="img-fluid">
          </div>
          @else
          <div class="text-center">
            <img src="" alt="商品画像がありません" class="img-fluid rounded text-center">
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h3 id="jsPrice">小計  (税抜) : {{ $product->price }}円</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-3 text-left">
          <h2>商品名</h2>
        </div>
        <div class="col-9 text-left">
          <h2>{{ $product->name }}</h2>
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
            <h5>{{ $product->content }}</h5>
          </div>
        </div>
      </div>
        {!! Form::open(['route' => ['sale.store.cart', $product->id]]) !!}
          <div class='form'>
            <div class="form-group col-3  @if($errors->has('quentity')) has-error @endif">
              <label for="quentity1">数量</label>
              {!! Form::text('quentity', null, ['class' => 'form-control form-control-sm', 'id' => 'jsNum', 'placeholder' => '1'])!!}
              <span class="help-block">{{ $errors->first('quentity') }}</span>
            </div>
            <div class="form-group text-center">
              {!! Form::submit('カートに入れる', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::hidden('price', $product->price) !!}
            {!! Form::hidden('product_id', $product->id) !!}
          </div>
        {!! Form::close() !!}
    </div>
  </div>
</main>
@endsection