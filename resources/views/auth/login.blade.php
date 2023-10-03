<x-forms.form :action="route('login.store')">
    <label>{{ __('email') }}</label>
    <input name="email" required />

    <label>{{ __('password') }}</label>
    <input type="password" name="password">

    <button type="submit">{{ __('login') }}</button>
</x-forms.form>
