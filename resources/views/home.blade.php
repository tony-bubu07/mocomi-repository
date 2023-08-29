@extends('layouts.app')

@section('content')
<div class="wrap">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @can('admin')
                <div class="card-header">{{ __('管理者としてログインしています') }}</div>
                @elsecan('post-user')
                <div class="card-header">{{ __('投稿ユーザーとしてログインしています') }}</div>
                @elsecan('user')
                <div class="card-header">{{ __('一般ユーザーとしてログインしています') }}</div>
                @endcan

                <!-- <div class="card-body"> -->
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <!-- {{ __('You are logged in!') }} -->
                <!-- {{ __('ログイン中．．．') }} -->
                <a href="{{ route('top') }}" class="transition_top_button">
                    <p>TOPページへ</p>
                </a>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
@endsection