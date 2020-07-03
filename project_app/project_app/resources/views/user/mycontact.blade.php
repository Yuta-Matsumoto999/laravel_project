@extends('layouts.user')

@section('content')
<main>
  <div class="py-4">
    <div class="container">
      <div class="row">
        <h1>お問い合わせ一覧</h1>
      </div>
        <table class="table">
          <thead>
            <tr class="row">
              <th class="col-2 text-center">date</th>
              <th class="col-7 text-center">title</th>
              <th class="col-2 text-center">comment</th>
              <th class="col-1 text-center"></th>
            </tr>
            <tbody>
              @foreach ($contacts as $content)
              <tr class="row">
                {!! Form::open(['route' =>['sale.show.question', $content->id], 'method' => 'GET']) !!}
                <td class="col-2 text-center">{{ $content->created_at->format('Y/m/d') }}</td>
                <td class="col-7 text-center">{{ $content->title }}</td>
                <td class="col-2 text-center"></td>
                <td class="col-1 text-center">{!! Form::submit('詳細', ['class' => 'btn btn-primary']) !!}</td>
                {!! Form::close() !!}
              </tr>
              @endforeach
            </tbody>
          </thead>
        </table>
    </div>
  </div>
</main>
@endsection