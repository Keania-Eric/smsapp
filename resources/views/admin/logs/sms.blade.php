@extends('layouts.admin')

@section('page-css')

@endsection

@section('page')
    <section role="main" class="content-body">

        <header class="page-header">
            <h2>SMS Log</h2>
        </header>

        <div class="row">
            <div class="col-xs-12">
            <section class="panel">
				<div class="panel-body tab-content">
					<div id="access-log" class="tab-pane active">
						<table class="table table-striped table-no-more table-bordered  mb-none">
							<thead>
								<tr>
									<th style="width: 10%"><span class="text-normal text-sm">Type</span></th>
									<th style="width: 15%"><span class="text-normal text-sm">Date</span></th>
									<th style="width: 15%"><span class="text-normal text-sm">Phone</span></th>
									<th><span class="text-normal text-sm">Message</span></th>
								</tr>
							</thead>
							<tbody class="log-viewer">
								@forelse($logs as $log)
								<tr>
									<td data-title="Type" class="pt-md pb-md">
										<i class="fa fa-bug fa-fw text-muted text-md va-middle"></i> {{$log->type}}
									</td>
									<td data-title="Date" class="pt-md pb-md">
										{{$log->created_at}}
									</td>
									<td data-title="Phone" class="pt-md pb-md">
										{{$log->phone}}
									</td>
									<td data-title="Message" class="pt-md pb-md">
										{{$log->message}}
									</td>
								</tr>
								@empty
									<tr></tr>
								@endforelse
							
							</tbody>
						</table>
					</div>
					
				</div>
			</section>
            </div>
        </div>

    </section>
@endsection

@section('page-js')

@endsection