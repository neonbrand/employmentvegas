{{-- @dd($dropContent) --}}
<div class="items-center rounded-md hover:bg-gray-50 transition ease-in-out duration-150 {{ $menu_item->classes }}" x-data="{selected:null}">
    <div @click="selected !== {{ $dropContent->id }} ? selected = {{ $dropContent->id }} : selected = null" class="p-3 flex text-base leading-6 space-x-3 font-medium text-gray-900 cursor-pointer {{ $menu_item->classes }}">
        <div class="w-3/4">{{ $dropContent->label }}</div>
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-circle-down" :class="{'rotate-180': selected}" class="svg-inline--fa fa-arrow-circle-down fa-w-16 transform fill-current h-6 w-6 justify-end" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-143.6-28.9L288 302.6V120c0-13.3-10.7-24-24-24h-16c-13.3 0-24 10.7-24 24v182.6l-72.4-75.5c-9.3-9.7-24.8-9.9-34.3-.4l-10.9 11c-9.4 9.4-9.4 24.6 0 33.9L239 404.3c9.4 9.4 24.6 9.4 33.9 0l132.7-132.7c9.4-9.4 9.4-24.6 0-33.9l-10.9-11c-9.5-9.5-25-9.3-34.3.4z"></path></svg>
    </div>
    <div x-show="selected == {{ $dropContent->id }}" class="border rounded bg-gray-50 transition ease-in-out duration-150">
        @foreach($dropContent->children as $dropItem)
        @if($dropItem->children)
        <div class="mb-4">
            <div class="-m-3 mt-8 my-4 mx-3 border-b cursor-pointer leading-5 font-medium tracking-wide text-gray-500 uppercase">{{ $dropItem->label }}</div>
            @foreach($dropItem->children as $children)
            <a href="{{ $children->url }}" class="py-2 px-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150 {{ $children->classes }}">
                <div class="text-base leading-6 font-medium text-gray-900">
                    {{ $children->label }}
                </div>
            </a>
            @endforeach
        </div>
        @else
        <a href="{{ $dropItem->url }}" class="-m-3 mt-8 my-4 mx-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150 {{ $dropItem->classes }}">
            <div class="text-base leading-6 font-medium text-gray-900">
                {{ $dropItem->label }}
            </div>
        </a>
        @endif
        @endforeach
    </div>
</div>
