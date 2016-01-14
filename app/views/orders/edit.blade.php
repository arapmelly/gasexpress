@extends('layouts.erp')
@section('content')

	
	

	



<div class="row">

	<div class="col-lg-5">
		
		

		 @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif



		<form class="form-horizontal" method="post" action="{{ URL::to('orders/update/'.$order->Order_id)}}">

			<div class="form-group">
				<label class="col-md-4 control-label">Order Date</label> 
				<div class="col-md-8">
					<div class="input-group date " id="datepicker"  >
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    <input class="form-control"  type="text" name="date" value="{{$order->date }}" >
                    
					
                </div>

                
				</div>
			</div>

			

		
			<div class="form-group">
				<label class="control-label col-md-4">Item</label>
					<div class="col-md-5">

							
						<select name="item" id="status" class=" form-control">


							<option value="{{$order->item }}">{{$order->item }}</option>

							@foreach($items as $item)
							<option value="{{$item->name." ".$item->description}}">{{$item->name." ".$item->description}}</option>
							@endforeach
						</select>
					</div>
			</div>



			

			<div class="form-group">
				<label class="col-md-4 control-label">Amount Charged</label> 
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">KES</span>
						<input type="text" class="form-control"  name="amount_charged" value="{{$order->amount_charged / $order->quantity}}">
					</div>																			
				</div>
			</div>


			<div class="form-group">
				<label class="col-md-4 control-label">Quantity</label> 
				<div class="col-md-3"><input type="text" name="quantity" class="form-control" value="{{$order->quantity }}"></div>
			</div>


			

			<div class="form-group">
				<label class="control-label col-md-4">Customer</label>
					<div class="col-md-5">

							
						<select name="customer" id="status" class=" form-control">


							<option value="{{$order->customer->id }}">{{$order->customer->name }}</option>

							@foreach($customers as $customer)
							<option value="{{$customer->id}}">{{$customer->name}}</option>
							@endforeach
						</select>
					</div>
			</div>



			<div class="form-group">
																		   <label class="col-md-4 control-label">Delivered</label> 
																		   <div class="col-md-8">
																		   	<?php

																		   	if($order->delivered){ ?>

																		   	  <label class="checkbox"> <input type="checkbox" class="uniform" name="delivered" value="1" checked>  </label> 
																		  <?php  } else { ?>

																		  	  <label class="checkbox"> <input type="checkbox" class="uniform" name="delivered" value="1">  </label> 
																		   <?php } ?>
																			
																			
																		   </div>
																		</div>



			<div class="form-group">
																		   <label class="col-md-4 control-label">Cancelled</label> 
																		   <div class="col-md-8">
																		   	<?php

																		   	if($order->cancelled){ ?>

																		   	  <label class="checkbox"> <input type="checkbox" class="uniform" name="cancelled" value="1" checked>  </label> 
																		  <?php  } else { ?>

																		  	  <label class="checkbox"> <input type="checkbox" class="uniform" name="cancelled" value="1">  </label> 
																		   <?php } ?>
																			
																			
																		   </div>
																		</div>
															

<input type="hidden" name="updated_by" class="form-control" value="{{Confide::user()->username}}">

			<div class="form-actions clearfix"> <input type="submit" value="Save" class="btn btn-primary pull-right"> </div>


		</form>



	</div>	

</div>


           
@stop