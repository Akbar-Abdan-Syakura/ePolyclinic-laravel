@extends('layouts.app')

{{-- set title --}}
@section('title', 'Transaction')

@section('content')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">

        {{-- error --}}
        @if ($errors->any())
        <div class="alert bg-danger alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- breadcumb --}}
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Transaction</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Transaction</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                    <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1"
                        id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="ft-printer icon-left"></i> Export</button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        @can('transaction_export')
                        <a class="dropdown-item" href="{{ route('backsite.transaction.export') }}">Excel
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

        {{-- table card --}}
        @can('transaction_table')
        <div class="content-body">
            <section id="table-home">
                <!-- Zero configuration table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Transaction List</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">

                                    <div class="table-responsive">
                                        <table
                                            class="table table-striped table-bordered text-inputs-searching default-table">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Transaction Code</th>
                                                    <th>Doctor</th>
                                                    <th>Patient</th>
                                                    <th>Fee Doctor</th>
                                                    <th>Fee Poli Services</th>
                                                    <th>Fee Hospital</th>
                                                    <th>Sub total</th>
                                                    <th>PPN</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($transaction as $key => $transaction_item)
                                                <tr data-entry-id="{{ $transaction_item->id }}">
                                                    <td>{{ isset($transaction_item->created_at) ? date("d/m/Y
                                                        H:i:s",strtotime($transaction_item->created_at)) : '' }}</td>
                                                    <td>{{ $transaction_item->transaction_code ?? '' }}</td>
                                                    <td>{{ $transaction_item->appointment->doctor->name ?? '' }}</td>
                                                    <td>{{ $transaction_item->appointment->user->name ?? '' }}</td>
                                                    <td>{{ 'IDR '.number_format($transaction_item->fee_doctor) ?? '' }}
                                                    </td>
                                                    <td>{{ 'IDR '.number_format($transaction_item->fee_poli) ?? ''
                                                        }}</td>
                                                    <td>{{ 'IDR '.number_format($transaction_item->fee_clinic) ?? ''
                                                        }}</td>
                                                    <td>{{ 'IDR '.number_format($transaction_item->sub_total) ?? '' }}
                                                    </td>
                                                    <td>{{ 'IDR '.number_format($transaction_item->ppn) ?? '' }}</td>
                                                    <td>{{ 'IDR '.number_format($transaction_item->total) ?? '' }}</td>
                                                </tr>
                                                @empty
                                                {{-- not found --}}
                                                @endforelse
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Transaction Code</th>
                                                    <th>Doctor</th>
                                                    <th>Patient</th>
                                                    <th>Fee Doctor</th>
                                                    <th>Fee Poli Services</th>
                                                    <th>Fee Hospital</th>
                                                    <th>Sub total</th>
                                                    <th>PPN</th>
                                                    <th>Total</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @endcan

    </div>
</div>
<!-- END: Content-->

@endsection

@push('after-script')
<script>
    $('.default-table').DataTable( {
            "order": [],
            "paging": true,
            "lengthMenu": [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"] ],
            "pageLength": 10
        });
</script>
@endpush
