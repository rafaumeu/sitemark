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

    const elements = {
        name: {
            input: document.getElementById('name'),
            check: document.getElementById('name-check')
        },
        surname: {
            input: document.getElementById('surname'),
            check: document.getElementById('surname-check')
        },
        email: {
            input: document.getElementById('email'),
            check: document.getElementById('email-check')
        },
        password: {
            input: document.getElementById('password'),
            check: document.getElementById('password-check')
        },
        submitBtn: document.getElementById('submit-btn'),
        passwordRules: {
            container: document.getElementById('password-rules'),
            length: document.getElementById('rule-length'),
            uppercase: document.getElementById('rule-uppercase'),
            special: document.getElementById('rule-special'),
            number: document.getElementById('rule-number')
        }
    };

    const validators = {
        name: (val) => val.trim().length >= 3,
        surname: (val) => val.trim().length >= 3,
        email: (val) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val),
        password: (val) => {
            return {
                hasLength: val.length >= 8,
                hasUpper: /[A-Z]/.test(val),
                hasSpecial: /[!@#$%^&*(),.?":{}|<>]/.test(val),
                hasNumber: /[0-9]/.test(val),
                isValid: function() {
                    return this.hasLength && this.hasUpper && this.hasSpecial && this.hasNumber;
                }
            };
        }
    };

    const toggleCheck = (el, isValid) => {
        if (!el) return;
        if (isValid) el.classList.remove('hidden');
        else el.classList.add('hidden');
    };

    function validateForm() {
        // Safe check if elements exist before reading values
        const nameValid = elements.name.input ? validators.name(elements.name.input.value) : false;
        const surnameValid = elements.surname.input ? validators.surname(elements.surname.input.value) : false;
        const emailValid = elements.email.input ? validators.email(elements.email.input.value) : false;

        let passValid = false;
        if (elements.password.input) {
            const passResult = validators.password(elements.password.input.value);
            passValid = passResult.isValid();
        }

        if (nameValid && surnameValid && emailValid && passValid) {
            elements.submitBtn.removeAttribute('disabled');
        } else {
            elements.submitBtn.setAttribute('disabled', 'true');
        }
    }

    // Attach listeners
    if (elements.name.input) {
        elements.name.input.addEventListener('input', (e) => {
            toggleCheck(elements.name.check, validators.name(e.target.value));
            validateForm();
        });
    }

    if (elements.surname.input) {
        elements.surname.input.addEventListener('input', (e) => {
            toggleCheck(elements.surname.check, validators.surname(e.target.value));
            validateForm();
        });
    }

    if (elements.email.input) {
        elements.email.input.addEventListener('input', (e) => {
            toggleCheck(elements.email.check, validators.email(e.target.value));
            validateForm();
        });
    }

    if (elements.password.input) {
        elements.password.input.addEventListener('input', (e) => {
            const val = e.target.value;
            const result = validators.password(val);

            toggleCheck(elements.passwordRules.container, val.length > 0);

            const setStatus = (el, condition) => {
                if (condition) {
                    el.classList.remove('text-content-secondary');
                    el.classList.add('text-accent-green', 'font-medium');
                } else {
                    el.classList.remove('text-accent-green', 'font-medium');
                    el.classList.add('text-content-secondary');
                }
            }

            setStatus(elements.passwordRules.length, result.hasLength);
            setStatus(elements.passwordRules.uppercase, result.hasUpper);
            setStatus(elements.passwordRules.special, result.hasSpecial);
            setStatus(elements.passwordRules.number, result.hasNumber);

            toggleCheck(elements.password.check, result.isValid());
            validateForm();
        });
    }
</script>
