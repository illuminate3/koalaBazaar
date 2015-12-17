@extends('dashboard.customer.mainCustomer')


@section('title','Adres Ekle')
@endsection


@section('page_level_content')

    @if($errors->has())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <i class="icon-remove-sign"></i>{{ $error }}
            </div>
        @endforeach
    @endif

    @if(\Illuminate\Support\Facades\Session::has('success'))
        @foreach (\Illuminate\Support\Facades\Session::pull('success') as $success)
            <div class="alert alert-success">
                <i class="icon-remove-sign"></i>{{ $success }}
            </div>
        @endforeach
    @endif
    <div class="row">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil"></i>Adres Ekleyin
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title="">
                    </a>
                    <a href="javascript:;" class="remove" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form  action="{{action('Dashboard\AddressController@store')}}" method="post"class="horizontal-form">
                    <div class="form-body">
                        <h3 class="form-section">Adresiniz</h3>

                        <div class="row">
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>Adres Adı</label>
                                    <input type="text" class="form-control" name="address_name" value="{{ old('address_name') }}">
                                </div>
                            </div>

                            </div>
                        <div class="row">
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>İsim</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>Soyisim</label>
                                    <input type="text" class="form-control" name="surname" value="{{ old('surname') }}">
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>Telefon</label>
                                    <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>Semt</label>
                                    <input type="text" class="form-control" name="distinct" value="{{ old('distinct') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Şehir</label>
                                    <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ülke</label>
                                    <select class="form-control input-medium" data-placeholder="Select..." tabindex="-1" name="country" value="{{ old('country') }}">
                                        <option value="">Seçiniz...</option>
                                        <option value="TR">Türkiye</option>
                                        <option value="FR">Fransa</option>
                                        <option value="USA">Amerika Birleşik Devletleri</option>
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Adres Detayları</label>
                                <textarea class="form-control" rows="3" name="address_detail" > {{ old('address_detail') }}</textarea>
                            </div>
                            </div>

                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Posta Kodu</label>
                                    <input type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="submit" class="btn blue"><i class="fa fa-check"></i> Adresi Ekle</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>

    </div>
    @endsection
