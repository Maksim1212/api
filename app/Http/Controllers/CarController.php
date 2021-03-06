<?php

namespace App\Http\Controllers;

use App\Exceptions\CarNotBelongsToUser;
use App\Http\Requests\CarRequest;
use App\Http\Resources\Car\CarCollection;
use App\Http\Resources\Car\CarResource;
use App\Model\Car;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    public function index()
    {
        return CarCollection::collection(Car::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        $car = new Car;
        $car->name = $request->name;
        $car->yearOfissue = $request->yearOfissue;
        $car->free = $request->free;
        $car->state = $request->state;
        $car->start_route_at = $request->start_route_at;
        $car->finish_route_at = $request->finish_route_at;
        $car->start_repairs_at = $request->start_repairs_at;
        $car->finish_repairs_at = $request->finish_repairs_at;
        $car->save();

        return response([
            'data' => new CarResource($car)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Car $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return new CarResource ($car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Car $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Car $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $this->CarUserCheck($car);
        $request['detail'] = $request->description;
        unset($request['description']);
        $car->update($request->all());

        return response([
            'data' => new CarResource($car)
        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Car $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function CarUserCheck($car)
    {
        if (Auth::id() !== $car->user_id) {
            throw new CarNotBelongsToUser;
        }
    }
}
