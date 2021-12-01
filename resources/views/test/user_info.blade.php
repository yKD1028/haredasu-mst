@extends('layouts.app')

@section('content')
<div>
  <p>{{$user->email}}</p>
  <p>{{$user->password}}</p>
  <p>{{$user->first_name}}</p>
  <p>{{$user->last_name}}</p>
  <p>{{$user->first_name_kana}}</p>
  <p>{{$user->last_name_kana}}</p>
  <p>{{$user->tell}}</p>
  <p>{{$user->zip}}</p>
  <p>{{$user->address}}</p>

  <div>
    <form action="/regist_user_info" method="post">
      @csrf
      <div class="form-group row">
        <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('first_name') }}</label>

        <div class="col-md-6">
          <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name">

          @error('first_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('last_name') }}</label>

        <div class="col-md-6">
          <input id="last_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">

          @error('last_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="first_name_kana" class="col-md-4 col-form-label text-md-right">{{ __('first_name_kana') }}</label>

        <div class="col-md-6">
          <input id="first_name_kana" type="text" class="form-control @error('first_name_kana') is-invalid @enderror" name="first_name_kana" value="{{ old('first_name_kana') }}" required autocomplete="first_name_kana">

          @error('first_name_kana')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="last_name_kana" class="col-md-4 col-form-label text-md-right">{{ __('last_name_kana') }}</label>

        <div class="col-md-6">
          <input id="last_name_kana" type="text" class="form-control @error('last_name_kana') is-invalid @enderror" name="last_name_kana" value="{{ old('last_name_kana') }}" required autocomplete="last_name_kana">

          @error('last_name_kana')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="tell" class="col-md-4 col-form-label text-md-right">{{ __('tell') }}</label>

        <div class="col-md-6">
          <input id="tell" type="text" class="form-control @error('tell') is-invalid @enderror" name="tell" value="{{ old('tell') }}" required autocomplete="tell">

          @error('tell')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="zip" class="col-md-4 col-form-label text-md-right">{{ __('zip') }}</label>

        <div class="col-md-6">
          <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" required autocomplete="zip">

          @error('zip')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('address') }}</label>

        <div class="col-md-6">
          <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

          @error('address')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
            {{ __('ユーザ情報登録') }}
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection