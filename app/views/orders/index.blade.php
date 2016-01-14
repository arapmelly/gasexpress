@extends('layouts.erp')
@section('content')	

<br><div class="row">
	<div class="col-lg-12">
  <h3>Orders</h3>

<hr>
</div>	
</div>

<div class="row">

	@if (Session::has('success'))
        <div class="alert alert-success">
                {{ Session::get('success') }}<br>        
        </div>
        @endif

	<div class="col-lg-12">
		<div class="panel panel-default">
      <div class="panel-heading">
          <a class="btn btn-info btn-sm" href="{{ URL::to('orders/create')}}">new order</a>
        </div>
        <div class="panel-body">
		
		 <table id="users" class="table table-condensed table-bordered table-responsive table-hover">

			<thead>


				<th>Date</th>
				<th>Item</th>
				<th>Quantity</th>
				
				
				<th> Total Amount </th>
				<th>Balance</th>
				<th>Customer</th>
				
				<th>status</th>
				<th></th>
				

			</thead>

			<tbody>

				@foreach($orders as $order)

					<tr>


						<td> {{ $order->date }}</td>
						<td> {{ $order->item }}</td>
						
						<td> {{ $order->quantity }}</td>
					
						<td>{{ $order->total_amount }}</td>
						<td>{{ $order->payable_amount - $order->payment }}</td>
						<td>{{ $order->name }}</td>
						
						
							<?php 

							if($order->status=="Cancelled") {

								echo "<td>Cancelled</td>";
							}

							elseif($order->status=="delivered"){ ?> 

							<td>Delivered</td>

							<?php

							 } 

							else 
							{

							 ?> 

								<td>Undelivered</td>

							<?php 
							} 

							?>

						
						<td>
							<a href="{{ URL::to('orders/edit/'.$order->Order_id)}}" class="btn btn-success btn-xs">Update</a>
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