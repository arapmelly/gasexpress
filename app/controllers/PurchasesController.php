<?php

class PurchasesController extends \BaseController {

	/**
	 * Display a listing of stocks
	 *
	 * @return Response
	 */
	public function index()
	{
		$stocks = DB::table("purchases")
		        ->join("items","purchases.item","=","items.id")
		        ->get();


		return View::make('purchases.index', compact('stocks'));
	}

	/**
	 * Show the form for creating a new stock
	 *
	 * @return Response
	 */
	public function create()
	{

		$items = Item::all();
		$accounts = Account::all();
		return View::make('purchases.create', compact('items', 'accounts'));
	}

	/**
	 * Store a newly created stock in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		

		$stock = new Purchase;
	    $stock->item = Input::get('item');
		$stock->selling_price = Input::get('selling_price');
		$stock->price = Input::get('purchase_price');
		$stock->quantity = Input::get('quantity');
		$stock->status = Input::get('status');
		$stock->account = Input::get('account');
		$stock->save();

		return Redirect::route('purchases.index');
	}

	/**
	 * Display the specified stock.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$stock = Stock::findOrFail($id);

		return View::make('purchases.show', compact('stock'));
	}

	/**
	 * Show the form for editing the specified stock.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$stock = Stock::find($id);

		return View::make('purchases.edit', compact('stock'));
	}

	/**
	 * Update the specified stock in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$stock = Stock::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Stock::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$stock->item = Input::get('item');
		$stock->selling_price = Input::get('selling_price');
		$stock->purchase_price = Input::get('purchase_price');
		$stock->quantity = Input::get('quantity');
		$stock->status = Input::get('status');
		$stock->account = Input::get('account');
		$stock->update();

		return Redirect::route('purchases.index');
	}

	/**
	 * Remove the specified stock from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Stock::destroy($id);

		return Redirect::route('purchases.index');
	}

}
