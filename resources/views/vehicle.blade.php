@extends('layouts.app')

@section('content')
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Kendaraan</div>

                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                              <thead>
                                <tr>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Konsumsi BBM</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jadwal Service</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe Kendaraan</th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kepemilikan Kendaraan</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($vehicle as $value)
                                    <tr>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->consumption_fuel}}</td>
                                        <td>{{$value->service_schedule}}</td>
                                        <td>{{$value->vehicleType->name}}</td>
                                        <td>{{$value->vehicleOwnership->name}}</td>
                                    </tr>
                                @endforeach
                                {{$vehicle->links()}}
                              </tbody>
                            </table>
                          </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
