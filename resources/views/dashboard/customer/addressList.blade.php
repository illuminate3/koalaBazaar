@extends('dashboard.customer.mainCustomer')

@section('title','Adreslerim')
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
    <div class="col-md-12">
        <div class="portlet box purple">
            <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Adresleriniz
            </div>
            <div class="actions">
                <a href="{{action('Dashboard\AddressController@create')}}" class="btn btn-default btn-sm">
                    <i class="fa fa-plus"></i> Adres Ekle</a>
            </div>
        </div>
            <div class="portlet-body">
            <div id="sample_3_wrapper" class="dataTables_wrapper no-footer">

                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_3" role="grid" aria-describedby="sample_3_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="sample_3" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
										 Username: activate to sort column ascending" style="width: 80px;">
                                Address Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_3" rowspan="1" colspan="1" aria-label="
										 Email: activate to sort column ascending" style="width: 139px;">
                                City
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="sample_3" rowspan="1" colspan="1" aria-label="
										 Status: activate to sort column ascending" style="width: 73px;">
                                Düzenle
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($addresses as $address)
                            <tr class="odd gradeX" role="row">
                                <td>
                                    {{ $address->address_name }}
                                </td>
                                <td>
                                    {{ $address->city }}
                                </td>
                                <td>
                                    <a href="{{ action('Dashboard\AddressController@edit',$address->id) }}" class="btn default btn-xs purple">
                                        Düzenle</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                 </div>
            </div>
        </div>
    </div>
</div>

    @endsection