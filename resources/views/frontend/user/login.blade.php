@extends('frontend.layouts.user')

@section('content')

    <main class="flex-fill">
        <section class="section lb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <section class="login-widget text-center align-self-center" style="padding:60px 0;">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-6 col-lg-5">
                                        <div class="newsletter-widget text-center align-self-center">
                                            <h3>Войти в аккаунт</h3>
                                            <p>Введите свой адрес электронной почты и пароль для входа</p>
                                            <form class="form-inline flex-column" method="post" action="{{ route('authentication') }}">
                                                @csrf
                                                <input
                                                        type="email"
                                                        name="email"
                                                        placeholder="Ваша почта"
                                                        required
                                                        class="form-control mb-3 w-100">
                                                <input
                                                        type="password"
                                                        name="password"
                                                        placeholder="Пароль"
                                                        required
                                                        class="form-control mb-3 w-100">
                                                <button
                                                        type="submit"
                                                        class="btn btn-default btn-block mb-3">
                                                    Войти
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
    </main>

@endsection