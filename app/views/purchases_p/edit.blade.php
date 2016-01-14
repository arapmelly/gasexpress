@extends('layouts.main')
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

		
		
		<form class="form-horizontal" method="post" action="{{ URL::to('stocks/update/'.$stock->id)}}">



			<div class="form-group">
				<label class="col-md-4 control-label">Brand Name</label> 
				<div class="col-md-8"><input type="text" name="brand" class="form-control" value="{{ $stock->brand }}"></div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label">Capacity</label> 
				<div class="col-md-8">
					<div class="input-group">
						
						<input type="text" class="form-control"  name="capacity" value="{{ $stock->capacity }}">
						<span class="input-group-addon">KGS</span>
					</div>																			
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label">Price</label> 
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon">KES</span>
						<input type="text" class="form-control"  name="price" value="{{ $stock->price }}">
					</div>																			
				</div>
			</div>


			<div class="form-group">
				<label class="col-md-4 control-label">Quantity</label> 
				<div class="col-md-3"><input type="text" name="quantity" class="form-control" value="{{ $stock->quantity }}"></div>
			</div>


			<div class="form-group">
				<label class="control-label col-md-4"> Type</label>
					<div class="col-md-4">
						<select name="status" id="status" class=" form-control">
							<option value="{{ $stock->status }}">{{ $stock->status }}</option>
							<option value="empty">Empty</option>
							<option value="full">Full</option>
						</select>
					</div>
			</div>



			<div class="form-actions clearfix"> <input type="submit" value="Update" class="btn btn-primary pull-right"> </div>


		</form>



	</div>	

</div>
@stop