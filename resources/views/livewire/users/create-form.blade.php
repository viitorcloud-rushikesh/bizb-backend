<x-elements.form class="mb-5" action="{{ $action }}" method="{{ $method }}" id="{{ $elementId }}">
    <div class="row">
        <div class="col-lg-3 text-center">
            {{-- <img class="img-avatar img-avatar-thumb" src="https://via.placeholder.com/300/09f/fff.png" alt=""> --}}
            <img class="img-avatar img-avatar-thumb avatar-preview" src="{{ $user->getFirstMediaUrl('avatar') }}" alt="">
            <input type="file" name="avatar">
        </div>
        <div class="col-lg-9">
            <div class="form-row">
                <x-elements.textbox class="form-group col-md-6" id="username" name="username" type="text" placeholder="Username" wire:model="username">
                    Username
				    <x-slot name="error">
				        @error('username') <span class="text-danger">{{ $message }}</span> @enderror
				    </x-slot>
                </x-elements.textbox>
                
                <x-elements.textbox class="form-group col-md-6" id="name" name="name" type="text" placeholder="Name" wire:model="name">
                    Name
				    <x-slot name="error">
				        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
				    </x-slot>
                </x-elements.textbox>
            </div>
            <div class="form-row">
                <x-elements.textbox class="form-group col-md-6" id="email" name="email" type="email" placeholder="Email Address" wire:model="email">
                    Email Address
				    <x-slot name="error">
				        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
				    </x-slot>
                </x-elements.textbox>
                <x-elements.textbox class="form-group col-md-6" id="mobile" name="mobile" type="text" placeholder="Phone Number" wire:model="mobile">
                    Phone Number
				    <x-slot name="error">
				        @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
				    </x-slot>
                </x-elements.textbox>
            </div>
            <div class="form-row">
                <x-elements.textbox class="form-group col-md-6" id="password" name="password" type="password" placeholder="Password" wire:model="password">
                    Password
				    <x-slot name="error">
				        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
				    </x-slot>
                </x-elements.textbox>
                <x-elements.textbox class="form-group col-md-6" id="password-confirm" name="password_confirmation" type="password" placeholder="Confirm Password" wire:model="password_confirmation">
                    Confirm Password
				    <x-slot name="error">
				        @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
				    </x-slot>
                </x-elements.textbox>
            </div>
        </div>
    </div>
    <livewire:users.role-permission/>
    <div class="row">
        <div class="col-lg-12 text-center mt-5">
            <x-elements.button type="button" wire:click="{{$submitEvent}}" class="btn-primary px-5">{{$submitText}}</x-elements.button>
        </div>
    </div>
</x-elements.form>