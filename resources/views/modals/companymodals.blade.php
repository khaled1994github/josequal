<div class="modal fade" id="addcompany" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Company</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name-add-company" class="block mt-1 w-full" type="text" name="name" required />
            </div>

            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email-add-company" class="block mt-1 w-full" type="email" name="email" required />
            </div>

            <div>
                <x-label for="website" :value="__('Website')" />

                <x-input id="website-add-company" class="block mt-1 w-full" type="text" name="website" />
            </div>

            <div>
                <x-label for="logo" :value="__('Logo')" />

                <x-input id="logo-add-company" class="block mt-1 w-full" type="file" name="logo" required />
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


<div class="modal fade" id="editcompany" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Company</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" id="edit-form-id" action="">
            @csrf

            <!-- Email Address -->
            <input type="hidden" id="employee-id">
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name-edit-company" class="block mt-1 w-full" type="text" name="name" required />
            </div>

            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email-edit-company" class="block mt-1 w-full" type="email" name="email" required />
            </div>

            <div>
                <x-label for="website" :value="__('Website')" />

                <x-input id="website-edit-company" class="block mt-1 w-full" type="text" name="website" />
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
