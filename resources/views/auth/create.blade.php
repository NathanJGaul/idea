<x-form title="Register an account" subtitle="Start tracking your ideas today.">
    <form action="/register" method="POST" class="mt-8 space-y-4">
        @csrf

        <x-form.field name="name" label="Name" required />
        <x-form.field name="email" label="Email" type="email" required />
        <x-form.field name="password" label="Password" type="password" required />

        <button type="submit" class="btn mt-4 h-10 w-full">Create Account</button>
    </form>
</x-form>
