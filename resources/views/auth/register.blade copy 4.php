<x-client-app>
    <div class="flex min-h-screen bg-white lg:bg-gray-50 py-0 lg:py-16 px-0 lg:px-56">
        <div class="my-0 lg:my-auto w-full rounded-lg bg-white shadow-none lg:shadow-sm">
            <div class="fixed left-0 lg:left-5 bottom-0 lg:bottom-1 z-50"></div>
            <div class="px-4 lg:px-8 mt-4 lg:mt-8">
                <div class="group" x-data="{ languageDropdown: false }" x-cloak="">
                    <button @click="languageDropdown = !languageDropdown"
                        class="flex flex-wrap items-center gap-1 rounded">
                        <div class="flex items-center gap-2">
                            <img src="images/Flag_of_Indonesia.svg"
                                class="border border-gray-200 rounded mr-1 w-10 h-6 object-center object-cover"
                                alt="" />
                            <span class="block text-xs lg:text-sm">Bahasa Indonesia</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-primary-500 ml-1 h-3 w-3"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div class="relative" x-show="languageDropdown" @click.outside="languageDropdown = false">
                        <div class="rounded-lg shadow-lg">
                            <div class="origin-top-right absolute z-200 left-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="https://perpustakaan.jakarta.go.id/language/id"
                                    class="flex items-center gap-2 px-4 py-2 text-xs lg:text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">
                                    <img src="images/Flag_of_Indonesia.svg" class="h-4 w-6 rounded border"
                                        alt="" />
                                    <span>Bahasa Indonesia</span>
                                </a>
                                <a href="https://perpustakaan.jakarta.go.id/language/en"
                                    class="flex items-center gap-2 px-4 py-2 text-xs lg:text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem" tabindex="-1" id="user-menu-item-1">
                                    <img src="images/Flag_of_the_United_Kingdom.svg" class="h-4 w-6 rounded border"
                                        alt="" />
                                    <span>Inggris</span>
                                    <div class="rounded px-2 py-0.5 text-xs lg:text-sm bg-green-100 text-green-500">
                                        v0.25
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-1 gap-x-4 lg:gap-x-8 items-center">

                {{-- form gawe regist --}}
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

                        <div class="col-md-6">
                            <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror"
                                name="nik" value="{{ old('nik') }}" required autofocus>

                            @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                        <div class="col-md-6">
                            <input id="nama" type="text"
                                class="form-control @error('nama') is-invalid @enderror" name="nama"
                                value="{{ old('nama') }}" required>

                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jenis_kelamin"
                            class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                        <div class="col-md-6">
                            <select id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                name="jenis_kelamin" required>
                                <option value="lakilaki" {{ old('jenis_kelamin') == 'lakilaki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>

                            @error('jenis_kelamin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telepon"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>

                        <div class="col-md-6">
                            <input id="telepon" type="text"
                                class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                                value="{{ old('telepon') }}" required>

                            @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                        <div class="col-md-6">
                            <input id="alamat" type="text"
                                class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                value="{{ old('alamat') }}" required>

                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username"
                            class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" required>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const nextButton = $("#nextButton");
        const countryContainer = $("#countryContainer");
        const indonesianNationalityTypeRadio = $("#nationality_type");
        const foreignerNationalityTypeRadio = $("#nationality_type2");

        $(document).ready(function() {
            if (
                foreignerNationalityTypeRadio.is(":checked") &&
                foreignerNationalityTypeRadio.val() === "WNA"
            ) {
                countryContainer.removeClass("hidden");
            }
        });

        $("#disclaimer").change(function() {
            if ($(this).prop("checked") === true) {
                nextButton.removeAttr("disabled");
                nextButton.addClass("bg-primary-600 hover:bg-primary-700 text-white");
                nextButton.removeClass("bg-gray-100 text-gray-500");
            } else if ($(this).prop("checked") === false) {
                nextButton.attr("disabled", true);
                nextButton.removeClass(
                    "bg-primary-600 hover:bg-primary-700 text-white"
                );
                nextButton.addClass("bg-gray-100 text-gray-500");
            }
        });

        indonesianNationalityTypeRadio.change(function() {
            if ($(this).prop("checked") === true) {
                countryContainer.addClass("hidden");
            }
        });

        foreignerNationalityTypeRadio.change(function() {
            if ($(this).prop("checked") === true) {
                countryContainer.removeClass("hidden");
            }
        });
    </script>

</x-client-app>