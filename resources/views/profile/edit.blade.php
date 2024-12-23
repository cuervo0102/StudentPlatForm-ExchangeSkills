<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <!-- Verification form for resending verification email -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Profile update form -->
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        
        <div>
            <x-input-label for="photo" :value="__('Photo')" />
            <input id="photo" type="file" name="photo" class="form-input mt-1 block w-full" accept="image/*">
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>

        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <textarea id="bio" name="bio" class="form-input mt-1 block w-full" required>{{ old('bio', $user->bio) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div>
            <x-input-label for="fields" :value="__('Fields')" />
            <select id="fields" name="fields" class="form-input mt-1 block w-full" required>
                <option value="">Select Field</option>
                <option value="field1" {{ old('fields', $user->fields) == 'field1' ? 'selected' : '' }}>Field 1</option>
                <option value="field2" {{ old('fields', $user->fields) == 'field2' ? 'selected' : '' }}>Field 2</option>
                <option value="field3" {{ old('fields', $user->fields) == 'field3' ? 'selected' : '' }}>Field 3</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('fields')" />
        </div>

        <div>
            <x-input-label for="date_joining" :value="__('Date Joining')" />
            <x-text-input id="date_joining" name="date_joining" type="date" class="mt-1 block w-full" :value="old('date_joining', $user->date_joining)" required />
            <x-input-error class="mt-2" :messages="$errors->get('date_joining')" />
        </div>

        <div>
            <x-input-label for="school_year" :value="__('School Year')" />
            <select id="school_year" name="school_year" class="form-input mt-1 block w-full" required>
                <option value="">Select School Year</option>
                <option value="First Year" {{ old('school_year', $user->school_year) == 'First Year' ? 'selected' : '' }}>First Year</option>
                <option value="Second Year" {{ old('school_year', $user->school_year) == 'Second Year' ? 'selected' : '' }}>Second Year</option>
                <option value="Third Year" {{ old('school_year', $user->school_year) == 'Third Year' ? 'selected' : '' }}>Third Year</option>
                <option value="Forth Year" {{ old('school_year', $user->school_year) == 'Forth Year' ? 'selected' : '' }}>Forth Year</option>
                <option value="Last Year" {{ old('school_year', $user->school_year) == 'Last Year' ? 'selected' : '' }}>Last Year</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('school_year')" />
        </div>

        <div> 
            <x-input-label for="linkdin_link" :value="__('LinkedIn Link')" />
            <x-text-input id="linkdin_link" name="linkdin_link" type="text" class="mt-1 block w-full" :value="old('linkdin_link', $user->linkdin_link)" />
            <x-input-error class="mt-2" :messages="$errors->get('linkdin_link')" />
        </div>

        <div>
            <x-input-label for="github_link" :value="__('GitHub Link')" />
            <x-text-input id="github_link" name="github_link" type="text" class="mt-1 block w-full" :value="old('github_link', $user->github_link)" />
            <x-input-error class="mt-2" :messages="$errors->get('github_link')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
