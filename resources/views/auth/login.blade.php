<x-layout.guest title="Acessar conta" header-gap="gap-[92px]">
    <div class="flex flex-col gap-[40px] w-full">
        <div>
            <h2 class="text-3xl font-bold tracking-tight text-content-primary font-heading">
                Acessar conta
            </h2>
            <div class="w-10 h-1 bg-accent-orange mt-2 rounded-full"></div>
        </div>
        <x-form :route="route('login')" post id="login-form" class="space-y-4">
            <x-input name="email" label="Email" placeholder="seu@email.com" value="{{ old('email') }}">
            </x-input>
            <x-input name="password" label="Senha" placeholder="********" type="password">
                <x-slot:suffix>
                    <button type="button" onclick="togglePassword()"
                        class="focus:outline-none hover:text-content-primary transition-colors duration-200">
                        <x-iconoir-eye-closed id="eye-closed" />
                        <x-iconoir-eye id="eye-open" class="hidden" />
                    </button>
                </x-slot:suffix>
            </x-input>

        </x-form>
        <div class="mt-9 flex flex-col gap-6">
            <x-button type="submit" class="shadow-lg shadow-accent-orange/20">Acessar conta</x-button>
            <div class="text-center text-xs text-white/60">
                <a href="{{ route('register') }}" class="hover:text-white transition-colors">Não tem cadastro?
                    <span class="font-bold text-white">Criar conta</span></a>
            </div>
        </div>
    </div>
</x-layout.guest>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const eyeOpen = document.getElementById('eye-open');
        const eyeClosed = document.getElementById('eye-closed');

        if (input.type === 'password') {
            input.type = 'text';
            eyeOpen.classList.remove('hidden');
            eyeClosed.classList.add('hidden');
        } else {
            input.type = 'password';
            eyeOpen.classList.add('hidden');
            eyeClosed.classList.remove('hidden');
        }
    }
</script>
