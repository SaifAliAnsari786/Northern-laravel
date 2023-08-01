<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Models\Slider;
use App\Services\SettingService;
use App\Services\SliderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    protected $view = 'admin.slider.';
    protected $redirect = 'super-admin/sliders';
    protected $siderService;

    public function __construct(SliderService $service)
    {
        $this->siderService = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = $this->siderService->search();
        $orderBys = Slider::orderBy('order_by', 'desc');
        if ($orderBys->count() > 0) {
            $orderBys = $orderBys->first()->order_by + 1;
        } else {
            $orderBys = 0;
        }
        return view($this->view . 'index', compact('settings', 'orderBys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view($this->view . 'create1');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $validatedData = $request->validated();
        $this->siderService->storeData($validatedData);
        Session::flash('success', 'Slider  has been created!');
        return redirect($this->redirect);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Slider::findOrFail($id);
        return view($this->view . 'edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderUpdateRequest $request, $id)
    {
        $setting = Slider::findOrFail($id);
            $validatedData = $request->validated();
            $this->siderService->updateData($setting, $validatedData);
            Session::flash('success', 'Slider  has been updated!');
        return redirect($this->redirect);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Slider::findOrFail($id);
        $path = public_path() . '/' . $setting->image;
        // SettingService::deleteImage($path); //unlink Image
        $setting->delete();
        Session::flash('success', 'Slider has been deleted!');
        return redirect($this->redirect);
    }

    public function changeOrder()
    {
        $validatedData = $this->validate(\request(), [
            'slider_id' => 'required|numeric',
            'order_by' => 'required|numeric'
        ]);
        $setting = Slider::findOrFail($validatedData['slider_id']);
        $setting->order_by = $validatedData['order_by'];
        $setting->save();
        return response()->json(['data' => 'ok', 'status' => 'change'], 200);
    }

    public function getImageDom()
    {
        $returnHTML = view($this->view . 'image_dom')->render();// or method that you prefere to return data + RENDER is the key here
        return response()->json(array('success' => true, 'html' => $returnHTML));

    }


}
