<div class="modal fade" id="addemployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('employee.store') }}">
            @csrf

            <input type="hidden" id="employee-id">
            <!-- Email Address -->
            <div>
                <x-label for="name" :value="__('First Name')" />

                <x-input id="fname-add-employee" class="block mt-1 w-full" type="text" name="fname" required />
            </div>

            <div>
                <x-label for="name" :value="__('Last Name')" />

                <x-input id="lname-add-employee" class="block mt-1 w-full" type="text" name="lname" required />
            </div>

            <input type="hidden" name="company" id="add-company" value="{{ $company_id }}">

            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email-add-employee" class="block mt-1 w-full" type="email" name="email" required />
            </div>

            <div>
                <x-label for="Phone" :value="__('Phone')" />

                <x-input id="phone-add-employee" class="block mt-1 w-full" type="text" name="phone" />
            </div>




            <div class="flex items-center justify-center mt-4">

                <x-button class="ml-3">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editemployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" id="edit-form-id" action="">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="name" :value="__('First Name')" />

                <x-input id="fname-edit-employee" class="block mt-1 w-full" type="text" name="fname" required />
            </div>

            <div>
                <x-label for="name" :value="__('Last Name')" />

                <x-input id="lname-edit-employee" class="block mt-1 w-full" type="text" name="lname" required />
            </div>

            <input type="hidden" name="company" id="edit-company" value="{{ $company_id }}">

            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email-edit-employee" class="block mt-1 w-full" type="email" name="email" required />
            </div>

            <div>
                <x-label for="Phone" :value="__('Phone')" />

                <x-input id="phone-edit-employee" class="block mt-1 w-full" type="text" name="phone" />
            </div>




            <div class="flex items-center justify-center mt-4">

                <x-button class="ml-3">
                    {{ __('Edit') }}
                </x-button>
            </div>
        </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
