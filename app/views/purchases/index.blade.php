@extends('layouts.erp')
@section('content')


<div class="row">

	<div class="col-lg-12">
  <h3>Purchases</h3>

<hr>
</div>	
</div>


<div class="row">
	<div class="col-lg-12">

    @if (Session::has('flash_message'))

      <div class="alert alert-success">
      {{ Session::get('flash_message') }}
     </div>
    @endif

    @if (Session::has('delete_message'))

      <div class="alert alert-danger">
      {{ Session::get('delete_message') }}
     </div>
    @endif

    <div class="panel panel-default">
      <div class="panel-heading">
          <a class="btn btn-info btn-sm" href="{{ URL::to('purchases/create')}}">new purchase</a>
        </div>
        <div class="panel-body">
		
		
		 <table id="users" class="table table-condensed table-bordered table-responsive table-hover">

			<thead>

				<th>Item</th>
				<th>Purchase Price</th>
				<th>Selling Price</th>
				<th>Quantity</th>
				<th>Type</th>
				<th></th>

			</thead>

			<tbody>

				@foreach($stocks as $stock)

					<tr>


						<td> {{ $stock->name." ".$stock->description }}</td>
						<td> {{ $stock->purchase_price }}</td>
						<td>{{ $stock->selling_price }}</td>
						<td>{{ $stock->quantity }}</td>
						<td>{{ $stock->status }}</td>
						<td>
							<a href="{{ URL::to('items/edit/'.$stock->id)}}" class="btn btn-success btn-sm">Update stock</a>
							&nbsp;&nbsp;
						
						</td>


					</tr>

				@endforeach

			</tbody>

		</table>



	</div>	
   </div>
</div>
	

	
</div>
@stop