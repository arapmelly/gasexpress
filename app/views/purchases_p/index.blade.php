@extends('layouts.main')
@section('content')

	
	

	



<div class="row">

	<div class="col-lg-10">
		
		
		<table id="members" class="table table-condensed table-bordered table-hover">

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
@stop