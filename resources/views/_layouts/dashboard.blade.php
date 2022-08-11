<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Evgenii') .' ' .__( 'Chesnokov' ) .' / ' .__( 'Test task for Digex LLC' ) }}
        </h2>
    </x-slot>

    @if ( session('server_message') )
        <div @class(['server-message','server-message_success' => ('success' == session('server_result')) ])>
            {{ __( session('server_message') ) }}
        </div>
    @endif
    @if ($errors->any())
        <div class="server-message server-message_error">
            <ul class="list">
                @foreach ($errors->all() as $error)
                    <li class="list__element">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="py-6">
        <div class="main__content max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="section">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
