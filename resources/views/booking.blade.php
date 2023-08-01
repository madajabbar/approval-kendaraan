@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Booking</div>

                <div class="card-body">
                    <form action="{{ route('booking.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="employee_name" class="form-label">Nama Pegawai</label>
                            <input type="text" class="form-control" id="employee_name" aria-describedby="employee_name"
                                name="employee_name">
                            <div id="employee_name" class="form-text">Masukan nama pegawai</div>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="date" aria-describedby="date"
                                name="date">
                            <div id="date" class="form-text">Masukan Tanggal</div>
                        </div>
                        <div class="mb-3">
                            <label for="vehicle_id" class="form-label">Kendaraan</label>
                            <div id="vehicle_id" class="form-text">Pilih Kendaraan</div>
                            <select class="form-control" name="vehicle_id" id="vehicle_id" name="vehicle_id">
                                @foreach ($vehicle as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">Approval Table</div>
                <div class="card-body">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                        Pegawai</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kendaraan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tipe Kendaraan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kepemilikan Kendaraan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Disetujui Oleh</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($approval as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->employee_name }}</td>
                                        <td>{{ $value->status }}</td>
                                        <td>{{ $value->vehicle->name }}</td>
                                        <td>{{ $value->vehicle->vehicleType->name }}</td>
                                        <td>{{ $value->vehicle->vehicleOwnership->name }}</td>
                                        <td>{{ $value->user ? $value->user->name : '' }}</td>
                                    </tr>
                                @endforeach
                                {{ $approval->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
