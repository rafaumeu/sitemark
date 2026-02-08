<x-layout.guest title="Criar conta" header-gap="gap-[64px]">
    <div class="flex flex-col gap-[40px] w-full">
        <div>
            <h2 class="text-xl font-bold tracking-tight text-content-primary font-heading">
                Criar conta
            </h2>
            <div class="w-[19px] h-[2px] bg-accent-orange mt-2 rounded-full"></div>
        </div>
        <x-form :route="route('register')" post id="register-form" class="space-y-[20px]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <x-input name="name" label="Nome" placeholder="Seu nome" value="{{ old('name') }}">
                    <x-slot:suffix>
                        <div id="name-check" class="hidden text-accent-green transition-opacity duration-300">
                            <x-iconoir-check-circle-solid class="w-5 h-5" />
                        </div>
                    </x-slot:suffix>
                </x-input>
                <x-input name="surname" label="Sobrenome" placeholder="Seu sobrenome" value="{{ old('surname') }}">
                    <x-slot:suffix>
                        <div id="surname-check" class="hidden text-accent-green transition-opacity duration-300">
                            <x-iconoir-check-circle-solid class="w-5 h-5" />
                        </div>
                    </x-slot:suffix>
                </x-input>
            </div>
            <x-input name="email" label="Email" placeholder="seu@email.com" value="{{ old('email') }}">
                <x-slot:suffix>
                    <div id="email-check" class="hidden text-accent-green transition-opacity duration-300">
                        <x-iconoir-check-circle-solid class="w-5 h-5" />
                    </div>
                </x-slot:suffix>
            </x-input>
            <x-input name="password" label="Senha" placeholder="********" type="password">
                <x-slot:suffix>
                    <div class="flex items-center gap-2">
                        <div id="password-check" class="hidden text-accent-green transition-opacity duration-300">
                            <x-iconoir-check-circle-solid class="w-5 h-5" />
                        </div>
                        <button type="button" onclick="togglePassword()"
                            class="focus:outline-none hover:text-content-primary transition-colors duration-200">
                            <x-iconoir-eye-closed id="eye-closed" />
                            <x-iconoir-eye id="eye-open" class="hidden" />
                        </button>
                    </div>
                </x-slot:suffix>
            </x-input>
            <div id="password-rules" class="hidden flex flex-col gap-1 transition-all duration-300 ease-in-out">
                <ul class="mt-1.5 space-y-1">
                    <li id="rule-length"
                        class="text-xs text-content-secondary flex items-center gap-2 transition-colors">
                        <span class="w-1.5 h-1.5 rounded-full bg-current"></span> Mínimo de 8 caracteres
                    </li>
                    <li id="rule-uppercase"
                        class="text-xs text-content-secondary flex items-center gap-2 transition-colors">
                        <span class="w-1.5 h-1.5 rounded-full bg-current"></span> Letra maiúscula
                    </li>
                    <li id="rule-special"
                        class="text-xs text-content-secondary flex items-center gap-2 transition-colors">
                        <span class="w-1.5 h-1.5 rounded-full bg-current"></span> Caractere especial
                    </li>
                    <li id="rule-number"
                        class="text-xs text-content-secondary flex items-center gap-2 transition-colors">
                        <span class="w-1.5 h-1.5 rounded-full bg-current"></span> Número
                    </li>
                </ul>
            </div>
            <div class="mt-9 flex flex-col gap-6">
                <x-button type="submit" id="submit-btn" disabled
                    class="shadow-lg shadow-accent-orange/20 disabled:opacity-50 disabled:cursor-not-allowed">Criar uma
                    conta</x-button>
                <div class="text-center text-xs text-white/60">
                    <a href="{{ route('login') }}" class="hover:text-white transition-colors">Já tem uma cadastro?
                        <span class="font-bold text-white">Acessar conta</span></a>
                </div>
            </div>
        </x-form>
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

    const nameInput = document.getElementById('name');
    const surnameInput = document.getElementById('surname');
    const emailInput = document.getElementById('email');
    const passInput = document.getElementById('password');

    const nameCheck = document.getElementById('name-check');
    const surnameCheck = document.getElementById('surname-check');
    const emailCheck = document.getElementById('email-check');
    const passwordCheck = document.getElementById('password-check');

    const ruleLength = document.getElementById('rule-length');
    const ruleUppercase = document.getElementById('rule-uppercase');
    const ruleSpecial = document.getElementById('rule-special');
    const ruleNumber = document.getElementById('rule-number');

    const toggleCheck = (el, isValid) => {
        if (!el) return;
        if (isValid) el.classList.remove('hidden');
        else el.classList.add('hidden');
    };

    if (nameInput) {
        nameInput.addEventListener('input', (e) => toggleCheck(nameCheck, e.target.value.trim().length >= 3));
    }
    if (surnameInput) {
        surnameInput.addEventListener('input', (e) => toggleCheck(surnameCheck, e.target.value.trim().length >= 3));
    }
    if (emailInput) {
        emailInput.addEventListener('input', (e) => {
            const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(e.target.value);
            toggleCheck(emailCheck, isValid);
        })
    }
    if (passInput) {
        passInput.addEventListener('input', (e) => {
            const val = e.target.value;

            const hasLength = val.length >= 8;
            const hasUpper = /[A-Z]/.test(val);
            const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(val);
            const hasNumber = /[0-9]/.test(val);

            const rulesContainer = document.getElementById('password-rules');
            toggleCheck(rulesContainer, val.length > 0);

            const setStatus = (el, condition) => {
                if (condition) {
                    el.classList.remove('text-content-secondary');
                    el.classList.add('text-accent-green', 'font-medium');
                } else {
                    el.classList.remove('text-accent-green', 'font-medium');
                    el.classList.add('text-content-secondary');
                }
            }
            setStatus(ruleLength, hasLength);
            setStatus(ruleUppercase, hasUpper);
            setStatus(ruleSpecial, hasSpecial);
            setStatus(ruleNumber, hasNumber);

            toggleCheck(passwordCheck, hasLength && hasUpper && hasSpecial && hasNumber);
            validateForm();
        })
    }

    const submitBtn = document.getElementById('submit-btn');

    function validateForm() {
        const nameValid = nameInput.value.trim().length >= 3;
        const surnameValid = surnameInput.value.trim().length >= 3;
        const emailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value);

        const passVal = passInput.value;
        const passValid = passVal.length >= 8 &&
            /[A-Z]/.test(passVal) &&
            /[!@#$%^&*(),.?":{}|<>]/.test(passVal) &&
            /[0-9]/.test(passVal);

        if (nameValid && surnameValid && emailValid && passValid) {
            submitBtn.removeAttribute('disabled');
        } else {
            submitBtn.setAttribute('disabled', 'true');
        }
    }

    // Add validation listeners to other inputs to create real-time button state
    [nameInput, surnameInput, emailInput].forEach(input => {
        if (input) {
            input.addEventListener('input', validateForm);
        }
    });
</script>
