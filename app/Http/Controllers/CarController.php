<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('user') -> paginate(9);
        //$cars tailgate 1:有 0:無
        $cars->map(function ($car) {
            $car->tailgate = $car->tailgate == 1 ? '有' : '無';
            return $car;
        });

        $drivers = $this->create();

        return view('car.index', compact('cars','drivers'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $cars = car::where('number', 'like', '%' . $search . '%')->paginate(9);
        $cars->map(function ($car) {
            $car->tailgate = $car->tailgate == 1 ? '有' : '無';
            return $car;
        });

        return view('car.index', compact('cars',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 獲取 permission_id 為 2 且不在 car 資料表中的司機
        $drivers = User::select('id', 'name')
                       ->where('permission_id', 2)
                       ->where('status', 0)
                       ->whereNotIn('id', Car::pluck('driver_id'))
                       ->get();

        return $drivers;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        // 獲取已驗證的數據
        $validatedData = $request->validated();

        // 驗證成功，創建 Car 實例
        Car::create($validatedData);

        // 資料保存後轉跳回新書總表
        return redirect(route('car.index'))->with([
            'success' => '帳號新增成功！',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $editCar = $car;
        $cars = Car::with('user') -> paginate(9);
        //$cars tailgate 1:有 0:無
        $cars->map(function ($car) {
            $car->tailgate = $car->tailgate == 1 ? '有' : '無';
            return $car;
        });

        $drivers = $this->create();

        return view('car.index', compact('cars','editCar', 'drivers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $editCar)
    {
        $editCar->update($request->validated());

        return redirect(route('car.index'))->with([
            'success' => '車輛 '. $editCar-> number . ' 資料更新成功！',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect(route('car.index'))->with([
            'success' => '車輛 [車號：'. $car-> number.'] 刪除成功！',
            'type' => 'success',
        ]);
    }
}
