<div class="mx-auto  rounded border w-96 bg-white shadow-sm">
    <form wire:submit.prevent="login">
        @csrf
        <h1 class="text-center mt-6 mb-16 text-2xl font-bold text-gray-900"> Login Page </h1>
        <div class="px-6  mb-4">
            <label for="formName" class="block text-gray-700 text-sm font-semibold mb-2">Username:</label>
            <input type="text" autofocus class="appearance-none border rounded w-full py-2 px-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" autofocus wire:model.defer="username" wire:keydown.enter='login'>
            @error('username') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
        </div>
        <div class="px-6  mb-4">
            <label for="formName" class="block text-gray-700 text-sm font-semibold mb-2">Password:</label>
            <input type="password" class=" appearance-none border rounded w-full py-2 px-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model.defer="password" wire:keydown.enter='login'>
            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
        </div>
        <div class="px-6 mb-2">
            @if (session()->has('message'))
            <span class="text-red-500 text-xs">{{ session('message') }}</span>
            @endif
        </div>
        <div class="px-6 mb-4 text-right">
            <button wire:loading.remove wire:click="login" type="button" class=" inline-flex justify-center  sm:w-1/4 w-full rounded-md border border-transparent px-4 py-2 bg-gray-900 text-base leading-6 font-medium text-white shadow-sm hover:bg-white hover:text-black hover:border-black transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Login
            </button>


            <p class="text-xs text-center mt-4 "><a data-turbolinks="false"  href="{{ url('/') }}" >Continue to site. . </a></p>
        </div>


    </form>
</div>
