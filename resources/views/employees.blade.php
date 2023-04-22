<x-app-layout>

  <x-slot name="js">
    <script src="{{ asset('js/employee.js') }}" defer></script>
  </x-slot>

  <x-slot name="css">
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
  </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  @if(session()->has("success"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                         <strong>  {{ session('success') }} </strong>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                  @endif

                  <x-auth-validation-errors class="mb-4" :errors="$errors" />
                      <h1 style="display:inline">Employees</h1>
                      <button style="float:right" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addemployee">
                        Add <b>+</b>
                      </button>
                      <br>
                      <br>
                        <table class="table">
                              <thead>
                                  <tr>
                                    <th style="text-align:center" scope="col">#</th>
                                    <th style="text-align:center" scope="col">First Name</th>
                                    <th style="text-align:center" scope="col">Last Name</th>
                                    <th style="text-align:center" scope="col">Email</th>
                                    <th style="text-align:center" scope="col">Phone</th>
                                    <th style="text-align:center" scope="col">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                    @foreach($employees as $employee)
                                      <tr>
                                        <th style="text-align:center" scope="row">{{ $employee->id }}</th>
                                        <td style="text-align:center">{{ $employee->first_name }}</td>
                                        <td style="text-align:center">{{ $employee->last_name }}</td>
                                        <td style="text-align:center">{{ $employee->email }}</td>
                                        <td style="text-align:center">{{ $employee->phone }}</td>
                                        <td style="text-align:center">

                                          <span onclick="getemployee(this)" data-id="{{ $employee->id }}" class="d-inline-block" style="cursor:pointer; margin:0 10px; color: #0b5ed7" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Edit Employee">
                                              <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                          </span>
                                          <span onclick="deleteemployee(this)" data-id="{{ $employee->id }}" class="d-inline-block example" style="cursor:pointer; margin:0 10px;color: #bb2d3b"  tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Delete Employee">
                                              <i class="fa-solid fa-trash fa-lg"></i>
                                          </span>
                                        </td>
                                      </tr>
                                    @endforeach
                              </tbody>
                        </table>
                        {{ $employees->links() }}

                </div>
            </div>
        </div>
    </div>
    @include('modals.employeemodals')
</x-app-layout>
