<?php

namespace App\Http\Controllers\Currency;

use App\Currency;
use App\Http\Requests\CurrencyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class CurrencyController
 * @package App\Http\Controllers\Currency
 */
class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Currency market';
        $currencies = Currency::all();
        return view('currencies' , [
            'currencies' => $currencies,
            'title' => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add currency';
        return view('currencies.create',[
            'title'=>$title,
            'currency' => []
        ]);
    }


    /**
     * @param CurrencyRequest $request
     */
    public function store(CurrencyRequest $request)
    {
        $currency = new Currency();
        $currency->title = $request->title;
        $currency->short_name = $request->short_name;
        $currency->logo_url = $request->logo_url;
        $currency->price = $request->price;

        $currency->save();

        return redirect()->route('currencies.index')->with('status','Currency Success Added');
    }


    /**
     * @param Currency $currency
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Currency $currency)
    {
        return view('currencies.show' , [
            'currency' => $currency,
            'title'=>$currency->title
        ]);
    }

    /**
     * @param Currency $currency
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Currency $currency)
    {
        return view('currencies.edit',['currency'=>$currency, 'title'=>$currency->title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * @param Currency $currency
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();
        return redirect()->route('currencies.index')->with('status','Currency Success Deleted');
    }
}
