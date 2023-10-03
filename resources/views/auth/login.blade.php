<x-layouts.app title="login">
    <x-forms.form :action="route('login.store')">
        <div class="container">
            <div class="d-flex flex-column col-md-6">
                <x-forms.label for="email">{{ __('email') }}</x-forms.label>
                <x-forms.input name="email" required/>

                <x-forms.label for="password">{{ __('password') }}</x-forms.label>
                <x-forms.input type="password" name="password"/>
                <div class="mt-4 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                </div>

            </div>
        </div>


    </x-forms.form>

</x-layouts.app>
