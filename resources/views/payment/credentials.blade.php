@extends('layouts.master')

@section('title', 'ثبت درخواست')

@section('content')
    @error('sameCurrency')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    @error('YekPayError')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session()->has('message'))
        <div class="alert alert-primary">{{ session('message') }}</div>
    @endif

    <form method="POST" action="{{ route('payment.gateway') }}">
        @csrf
        <div class="row">
            <div class="form-group col-6 mt-2">
                <label for="firstName">نام</label>
                <input type="text" class="form-control" id="firstName" placeholder="نام خود را وارد کنید"
                       name="firstName" value="{{ old('firstName') }}">
                @error('firstName')
                <div class="alert alert-danger">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>

            <div class="form-group col-6 mt-2">
                <label for="lastName">نام خانوادگی</label>
                <input type="text" class="form-control" id="lastName" placeholder="نام خانوادگی خود را وارد کنید"
                       name="lastName" value="{{ old('lastName') }}">
                @error('lastName')
                <div class="alert alert-danger">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>

            <div class="form-group col-6 mt-2">
                <label for="email">ایمیل</label>
                <input type="email" class="form-control" id="email" placeholder="ایمیل خود را وارد کنید" name="email" value="{{ old('email') }}">
                @error('email')
                <div class="alert alert-danger">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>

            <div class="form-group col-6 mt-2">
                <label for="mobile">شماره موبایل</label>
                <input type="text" class="form-control" id="mobile" placeholder="شماره موبایل خود را وارد کنید"
                       name="mobile" value="{{ old('mobile') }}">
                @error('mobile')
                <div class="alert alert-danger">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>

            <div class="form-group col-6 mt-2">
                <label for="postalCode">کد پستی</label>
                <input type="text" class="form-control" id="postalCode" placeholder="کد پستی را وارد کنید"
                       name="postalCode" value="{{ old('postalCode') }}">
                @error('postalCode')
                <div class="alert alert-danger">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>

            <div class="form-group col-6 mt-2">
                <label for="country">نام کشور</label>
                <select name="country" id="country" class="form-control">
                    @foreach($countries as $country)
                        <option value="{{ $country->name }}" {{ old('country') === $country->name ? 'selected': '' }}>@lang($country->name)</option>
                    @endforeach
                </select>
                @error('country')
                <div class="alert alert-danger">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>

            <div class="form-group col-6 mt-2">
                <label for="city">نام شهر</label>
                <select name="city" id="city" class="form-control">
                    @foreach($cities as $city)
                        <option value="{{ $city->name }}" {{ old('city') === $city->name ? 'selected': '' }}>@lang($city->name)</option>
                    @endforeach
                </select>
                @error('city')
                <div class="alert alert-danger">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>

            <div class="form-group col-6 mt-2">
                <label for="amount">مبلغ</label>
                <input type="text" class="form-control" id="amount" placeholder="مبلغ را وارد کنید"
                       name="amount" value="{{ old('amount') }}">
                @error('amount')
                <div class="alert alert-danger">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>

            <div class="form-group col-6 mt-2">
                <label for="fromCurrencyCode">واحد اولیه(برای مبادله)</label>
                <select name="fromCurrencyCode" id="fromCurrencyCode" class="form-control">
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->currency_code }}" {{ old('fromCurrencyCode') == $currency->currency_code ? 'selected': '' }}>{{ $currency->persian_name }}</option>
                    @endforeach
                </select>
                @error('fromCurrencyCode')
                <div class="alert alert-danger">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>

            <div class="form-group col-6 mt-2">
                <label for="toCurrencyCode">واحد ثانویه(واحد اولیه به این واحد تبدیل میشود)</label>
                <select name="toCurrencyCode" id="toCurrencyCode" class="form-control">
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->currency_code }}" {{ old('toCurrencyCode') == $currency->currency_code ? 'selected': '' }}>{{ $currency->persian_name }}</option>
                    @endforeach
                </select>
                @error('toCurrencyCode')
                <div class="alert alert-danger">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="address">آدرس</label>
                <textarea class="form-control" id="address" placeholder="آدرس را وارد کنید" name="address"
                          rows="4">{{ old('address') }}</textarea>
                @error('address')
                <div class="alert alert-danger">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>

            <div class="form-group mt-2">
                <label for="description">توضیحات</label>
                <textarea class="form-control" id="description" placeholder="توضیحات را وارد کنید" name="description"
                          rows="4">{{ old('description') }}</textarea>
                @error('description')
                <div class="alert alert-danger">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>

        </div>


        <button type="submit" class="btn btn-primary mt-4">پرداخت</button>
    </form>
@endsection
