@extends('layouts.admin.app')
@section('title','Accoutn transaction information')
@push('css_or_js')

@endpush

@section('content')
<div class="content container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{translate('messages.dashboard')}}</a></li>
            <li class="breadcrumb-item" aria-current="page">{{translate('messages.account_transaction')}}</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="d-sm-flex row align-items-center justify-content-between mb-2">
        <div class="col-md-6"> 
             <h4 class=" mb-0 text-black-50">{{translate('messages.account_transaction')}} {{translate('messages.information')}}</h4>
        </div>
    </div>
    <div class="row mt-3">
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="h3 mb-0  ">{{$account_transaction->from_type == 'store'?translate('messages.store'):translate('messages.deliveryman')}} {{translate('messages.info')}}</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-8 mt-2">
                        <h4>{{translate('messages.name')}}: {{$account_transaction->from_type == 'store' ?($account_transaction->store? $account_transaction->store->name : translate('messages.store deleted!')):($account_transaction->deliveryman? $account_transaction->deliveryman->f_name.' '.$account_transaction->deliveryman->l_name : translate('messages.Delivery Man Not Found'))}}</h4>
                        <h6>{{translate('messages.phone')}}  : {{$account_transaction->from_type == 'store'?($account_transaction->store ? $account_transaction->store->phone : translate('messages.store deleted!')):($account_transaction->deliveryman ? $account_transaction->deliveryman->phone : translate('messages.Delivery Man Not Found'))}}</h6>
                        <h6>{{translate('messages.cash_in_hand')}} : {{\App\CentralLogics\Helpers::format_currency($account_transaction->from_type == 'store' ? ($account_transaction->store ? $account_transaction->store->vendor->wallet->collected_cash : 0): ($account_transaction->deliveryman ? $account_transaction->deliveryman->wallet->collected_cash : 0))}}</h6>
                    </div>
                </div>
            </div>
        </div>
     
        <div class="col-md-6">
            {{-- {{ $wr }} --}}
           
            <div class="card">
                <div class="card-header">
                    <h3 class="h3 mb-0  ">{{translate('messages.transaction')}} {{translate('messages.information')}} </h3>
                </div>
                <div class="card-body">
                    <h6>{{translate('messages.amount')}} : {{\App\CentralLogics\Helpers::format_currency($account_transaction->amount)}}</h6>
                    <h6 class="text-capitalize">{{translate('messages.time')}} : {{$account_transaction->created_at->format('Y-m-d '.config('timeformat'))}}</h6>
                    <h6>{{translate('messages.method')}} : {{$account_transaction->method}}</h6>
                    <h6>{{translate('messages.reference')}} : {{$account_transaction->ref}}</h6>
                </div>
            </div>
          
       
       
        </div>
    
     

    </div>
 
</div>

@endsection

@push('script')

@endpush
