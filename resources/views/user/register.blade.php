@extends('user.main')
@section('title','Register')
@endsection

@section('content')

        <!-- Content
        ============================================= -->
<section id="content">

    <div class="content-wrap">
        <div class="container clearfix">
            <div class="col_one_third nobottommargin">
                <div class="well well-lg nobottommargin">
                    @if($errors->has())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <i class="icon-remove-sign"></i>{{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <form class="nobottommargin" action="{{ action('AuthenticationController@doLogin') }}"
                          method="post">

                        <h3>Giriş Yapın</h3>

                        <div class="col_full">
                            <label for="login-form-username">Email:</label>
                            <input type="text" name="email" value="" class="form-control"/>
                        </div>

                        <div class="col_full">
                            <label for="login-form-password">Parola:</label>
                            <input type="password" name="pass" value=""
                                   class="form-control"/>
                        </div>


                            <div class="col_full nobottommargin">
                                <button class="button button-3d" id="login-form-submit"
                                        name="login-form-submit" type="submit" value="login">Giriş
                                </button>
                                <a href="{{ action('AuthenticationController@loginviainstagram') }}"
                                   class="button button-3d button-blue" id="login-form-submit"
                                   name="login-with-instagram">Instagram ile Giriş
                                </a>
                            </div>

                    </form>
                </div>

            </div>

            <div class="col_two_third col_last nobottommargin">

                <div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

                    <div class="acctitle">
                        <i class="acc-open icon-user4"></i>Müşteri misiniz?
                    </div>
                    <div class="acc_content clearfix">
                        <form id="login-form" name="login-form" class="nobottommargin"
                              action="{{ action('Dashboard\CustomerController@store')}}" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                    <i class="fa fa-font"></i>
                </span>
                                    <input type="text" class="form-control input-circle-right"
                                           placeholder="İsim" name="firstname">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-font"></i>
                                        </span>
                                    <input type="text" class="form-control input-circle-right"
                                           placeholder="Soyisim" name="surname">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                     <span class="input-group-addon input-circle-left">
                                 <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="text" class="form-control input-circle-right"
                                           placeholder="Email" name="customeremail">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input class="form-control placeholder-no-fix input-circle-right"
                                           type="password" autocomplete="off" id="register_password"
                                           placeholder="Parolanız..." name="pass">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input class="form-control placeholder-no-fix input-circle-right"
                                           type="password" autocomplete="off" id="register_password"
                                           placeholder="Parolanızı doğrulayın..." name="rpass">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-phone"></i>
                                    </span>
                                    <input type="text" class="form-control input-circle-right"
                                           placeholder="05xx-xxx-xx-xx" name="phone">
                                </div>
                            </div>

                            <div class="col_full nobottommargin">
                                <button class="button button-3d" id="login-form-submit"
                                        name="login-form-submit" value="login">Kaydol
                                </button>
                                <a href="{{ action('AuthenticationController@registercustomerviainstagram') }}"
                                   class="button button-3d button-blue" id="login-form-submit"
                                   name="login-with-instagram">Instagram ile kaydol
                                </a>
                            </div>

                        </form>
                    </div>

                    <div class="acctitle">
                        <i class="acc-closed icon-user4"></i><i
                                class="acc-open icon-ok-sign"></i>Mağaza mısınız?
                    </div>
                    <div class="acc_content clearfix">
                        <a href="{{ action('AuthenticationController@registersupplierviainstagram') }}"
                           class="button button-3d button-blue nomargin" name="register-form-submit">Instagram
                            ile kaydol</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- #content end -->

@endsection