<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleFilterRequest;
use App\Http\Requests\VehicleStoreRequest;
use App\Http\Requests\VehicleUpdateRequest;
use App\User;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use PHPUnit\Util\Json;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::orderBy('id', 'desc')->paginate(6);

        $vehicles->each(function ($vehicle) {
            $vehicle->user;
            $vehicle->image->each(function ($image) {
                $image->path = URL('storage/' . $image->path);
            });
        });


        return view('vehicles.index', compact('vehicles'));
    }

    public function show(Vehicle $vehicle)
    {
        $vehicle->image;
        $vehicle->contact_info;
        $vehicle->user;
        foreach ($vehicle->image as $img) {
            $img->path = URL('storage/' . $img->path);
        }
        return view('vehicles.show', compact('vehicle'));
    }

    public function create()
    {
        $this->authorize('create', Vehicle::class);

        $oldInputs = json_encode(session()->getOldInput());
        return view('vehicle.create', compact('oldInputs'));
    }

    public function store(VehicleStoreRequest $request)
    {
        $this->authorize('create', Vehicle::class);

        $vehicle = auth()->user()->vehicle()->create($request->except(['images', 'show_ci']));

        if ($request->images)
            foreach ($request->images as $image) {
                $imagePath = $image->store('vehicles', 'public');

                $vehicle->image()->create([
                    'path' => $imagePath,
                ]);
            }

        if ($request->show_ci)
            foreach ($request->show_ci as $ci_id) {
                $ci = auth()->user()->contact_info()->find($ci_id);
                if ($ci) $vehicle->contact_info()->attach($ci);
            }

        return redirect("/vehicle/" . $vehicle->id);
    }

    public function edit(Vehicle $vehicle)
    {
        $this->authorize('update', $vehicle);

        foreach ($vehicle->image as $image) {
            $image->path = URL('storage/' . $image->path);
        }

        $oldValues = json_encode($vehicle);

        $attached_ci = $vehicle->contact_info;


        return view('vehicle.edit', compact('oldValues', 'vehicle', 'attached_ci'));
    }

    public function update(Vehicle $vehicle, VehicleUpdateRequest $request)
    {
        $this->authorize('update', $vehicle);

        $vehicle->update($request->except(['images', 'delete_image', 'show_ci']));

        if ($request->images)
            foreach ($request->images as $image) {
                $imagePath = $image->store('vehicles', 'public');

                $vehicle->image()->create([
                    'path' => $imagePath,
                ]);
            }

        if ($request->delete_image) foreach ($request->delete_image as $imageId) {

            $image = $vehicle->image->find($imageId);

            if ($image) $image->delete();
        }

        foreach ($vehicle->contact_info as $ci) {
            $vehicle->contact_info()->detach($ci);
        }

        if ($request->show_ci)
            foreach ($request->show_ci as $ci_id) {
                $ci = auth()->user()->contact_info()->find($ci_id);
                if ($ci) $vehicle->contact_info()->attach($ci);
            }

        return redirect("/vehicle/" . $vehicle->id);
    }

    public function filter(VehicleFilterRequest $request)
    {
        $vehicles =
            Vehicle::orderBy('id', 'desc')->when($request->make, function ($query, $make) {
                $query->where('make', '=', $make);
            })->when($request->model, function ($query, $model) {
                $query->where('model', '=', $model);
            })->when($request->min_year, function ($query, $min_year) {
                $query->where('year', '>=', $min_year);
            })->when($request->max_year, function ($query, $max_year) {
                $query->where('year', '<=', $max_year);
            })->when($request->steering, function ($query, $steering) {
                $query->where('steering', '=', $steering);
            })->when($request->min_cc, function ($query, $min_cc) {
                $query->where('engine_displacement', '>=', $min_cc);
            })->when($request->max_cc, function ($query, $max_cc) {
                $query->where('engine_displacement', '<=', $max_cc);
            })->when($request->drive, function ($query, $drive) {
                $query->where('driving_wheels', '=', $drive);
            })->when($request->transmission, function ($query, $transmission) {
                $query->where('transmission', '=', $transmission);
            })->when($request->min_km, function ($query, $min_km) {
                $query->where('distance', '>=', $min_km);
            })->when($request->max_km, function ($query, $max_km) {
                $query->where('distance', '<=', $max_km);
            })->when($request->fuel, function ($query, $fuel) {
                $query->where('fuel', '=', $fuel);
            })->when($request->condition, function ($query, $condition) {
                $query->where('condition', '=', $condition);
            })->when($request->min_price, function ($query, $min_price) {
                $query->where('price', '>=', $min_price);
            })->when($request->max_price, function ($query, $max_price) {
                $query->where('price', '<=', $max_price);
            })->paginate(6);

        $vehicles->each(function ($vehicle) {
            $vehicle->user;
            $vehicle->image->each(function ($image) {
                $image->path = URL('storage/' . $image->path);
            });
        });

        $endpoint = '/api/vehicle/filter';

        return view('vehicles.results', compact('vehicles', 'endpoint'));
    }

    public function search()
    {
        request()->validate([
            'search_term' => 'string|required|max:100'
        ]);

        $searchTerm = request()->search_term;

        $vehicles = Vehicle::where(DB::raw('concat(year," ",make," ",model," ",description)'), 'like', "%{$searchTerm}%")
            ->orWhere(DB::raw('concat(make," ",model," ",description," ",year)'), 'like', "%{$searchTerm}%")
            ->orWhere(DB::raw('concat(model," ",description," ",year," ",make)'), 'like', "%{$searchTerm}%")
            ->orWhere(DB::raw('concat(description," ",model," ",year," ",make)'), 'like', "%{$searchTerm}%")
            ->orWhere(DB::raw('concat(description," ",model," ",year," ",make)'), 'like', "%{$searchTerm}%")
            ->orderBy('id', 'desc')->paginate(6);

        $vehicles->each(function ($vehicle) {
            $vehicle->user;
            $vehicle->image->each(function ($image) {
                $image->path = URL('storage/' . $image->path);
            });
        });

        $endpoint = '/api/vehicle/search';

        return view('vehicles.results', compact('vehicles', 'endpoint'));
    }

    public function user_vehicles(User $user)
    {
        $vehicles = $user->vehicle()->orderBy('id', 'desc')->paginate(6);

        $vehicles->each(function ($vehicle) {
            $vehicle->user;
            $vehicle->image->each(function ($image) {
                $image->path = URL('storage/' . $image->path);
            });
        });

        $endpoint = "/api/vehicle/u/" . $user->id;

        return view('vehicles.results', compact('vehicles', 'endpoint'));
    }

    public function destroy(Vehicle $vehicle)
    {
        $this->authorize('delete', $vehicle);

        $vehicle->delete();

        return redirect("/");
    }
}
