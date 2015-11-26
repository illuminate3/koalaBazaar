@extends('dashboard.customer.mainCustomer')


@section('title','Edit Address')
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
                    <i class="fa fa-gift"></i>Form Sample
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title="">
                    </a>
                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
                    </a>
                    <a href="javascript:;" class="reload" data-original-title="" title="">
                    </a>
                    <a href="javascript:;" class="remove" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form  action="{{action('Dashboard\AddressController@update',$address->id)}}" method="post"class="horizontal-form">
                    <div class="form-body">
                        <h3 class="form-section">Address</h3>

                        <div class="row">
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>Adress Name</label>
                                    <input type="text" class="form-control" name="address_name" value="{{ $address->address_name }}">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $address->name }}">
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>Surname</label>
                                    <input type="text" class="form-control" name="surname" value="{{ $address->surname }}">
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" name="phone_number" value="{{ $address->phone_number }}">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>Distinct</label>
                                    <input type="text" class="form-control" name="distinct" value="{{ $address->distinct }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" value="{{ $address->city }}">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Country</label>
                                    <select class="form-control input-medium" data-placeholder="Select..." tabindex="-1" name="country">
                                        <option value="">Select...</option>
                                        <option value="TR" @if($address->country=='TR') selected @endif>Türkiye</option>
                                        <option value="FR" @if($address->country=='FR') selected @endif>Fransa</option>
                                        <option value="USA" @if($address->country=='USA') selected @endif>Amerika Birleşik Devletleri</option>
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Address Detail</label>
                                    <textarea class="form-control" rows="3" name="address_detail" > {{ $address->address_detail }}</textarea>
                                </div>
                            </div>

                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control" name="zip_code" value="{{ $address->zip_code }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="submit" class="btn blue"><i class="fa fa-check"></i> Adresi Düzenle</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>

    </div>
@endsection
