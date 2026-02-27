<x-form title="Login" subtitle="Sign in to your account.">
    <form action="/login" method="POST" class="mt-8 space-y-4">
        @csrf

        <x-form.field name="email" label="Email" type="email" required />
        <x-form.field name="password" label="Password" type="password" required />

        <button type="submit" class="btn mt-4 h-10 w-full">Login</button>
    </form>
</x-form>
