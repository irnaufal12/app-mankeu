berhasil login

<a class="" href="{{ route('logout-post') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout-post') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>