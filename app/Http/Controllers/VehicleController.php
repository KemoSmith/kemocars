<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleStoreRequest;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use PHPUnit\Util\Json;

class VehicleController extends Controller
{
    public function index()
    {

        $vehicles = Vehicle::all();

        foreach ($vehicles as $vehicle) {
            foreach ($vehicle->image as $image) {
                $image->path = URL('storage/' . $image->path);
            }
        }

        return view('vehicle.results', compact('vehicles'));
    }

    public function show(Vehicle $vehicle)
    {
        $vehicle->image;
        foreach ($vehicle->image as $img) {
            $img->path = URL('storage/' . $img->path);
        }
        return view('vehicle.show', compact('vehicle'));
    }

    public function create()
    {
        $oldInputs = json_encode(session()->getOldInput());
        return view('vehicle.create', compact('oldInputs'));
    }

    public function store(VehicleStoreRequest $request)
    {

        $vehicle = auth()->user()->vehicle()->create($request->except(['images']));

        if ($request->images)
            foreach ($request->images as $image) {
                $imagePath = $image->store('vehicles', 'public');

                $vehicle->image()->create([
                    'path' => $imagePath,
                ]);
            }

        return redirect("/vehicle/" . $vehicle->id);
    }

    public function edit(Vehicle $vehicle)
    {
        foreach ($vehicle->image as $image) {
            $image->path = URL('storage/' . $image->path);
        }

        $oldValues = json_encode($vehicle);


        return view('vehicle.edit', compact('oldValues', 'vehicle'));
    }

    public function update(Vehicle $vehicle)
    {
        $vehicle->update(request()->except(['images', 'delete_image']));

        if (request()->images)
            foreach (request()->images as $image) {
                $imagePath = $image->store('vehicles', 'public');

                $vehicle->image()->create([
                    'path' => $imagePath,
                ]);
            }

        if (request()->delete_image) foreach (request()->delete_image as $imageId) {

            $image = $vehicle->image->find($imageId);

            if ($image) $image->delete();
        }

        return redirect("/vehicle/" . $vehicle->id);
    }

    public function filter()
    {

        $vehicles = Vehicle::all();

        foreach ($vehicles as $vehicle) {
            foreach ($vehicle->image as $image) {
                $image->path = URL('storage/' . $image->path);
            }
        }

        if (request()->make)
            $vehicles = $vehicles->where('make', '=', request()->make);

        if (request()->model)
            $vehicles = $vehicles->where('model', '=', request()->model);

        if (request()->min_year)
            $vehicles = $vehicles->where('year', '>=', request()->min_year);

        if (request()->max_year)
            $vehicles = $vehicles->where('year', '<=', request()->max_year);

        if (request()->steering)
            $vehicles = $vehicles->where('steering', '=', request()->steering);

        if (request()->min_cc)
            $vehicles = $vehicles->where('engine_displacement', '>=', request()->min_cc);

        if (request()->max_cc)
            $vehicles = $vehicles->where('engine_displacement', '<=', request()->max_cc);

        if (request()->drive)
            $vehicles = $vehicles->where('driving_wheels', '=', request()->drive);

        if (request()->transmission)
            $vehicles = $vehicles->where('transmission', '=', request()->transmission);

        if (request()->min_km)
            $vehicles = $vehicles->where('distance', '>=', request()->min_km);

        if (request()->max_km)
            $vehicles = $vehicles->where('distance', '<=', request()->max_km);

        if (request()->fuel)
            $vehicles = $vehicles->where('fuel', '=', request()->fuel);

        if (request()->condition)
            $vehicles = $vehicles->where('condition', '=', request()->condition);

        if (request()->min_price)
            $vehicles = $vehicles->where('price', '>=', request()->min_price);

        if (request()->max_price)
            $vehicles = $vehicles->where('price', '<=', request()->max_price);

        return view('vehicle.results', compact('vehicles'));
    }

    public function search()
    {

        $vehicles = Vehicle::all();

        foreach ($vehicles as $vehicle) {
            foreach ($vehicle->image as $image) {
                $image->path = URL('storage/' . $image->path);
            }
        }

        return view('vehicle.results', compact('vehicles'));
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect("/");
    }
}
