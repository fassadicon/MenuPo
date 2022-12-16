
{{-- Notif Modal --}}

@props(['notif'])


<div class="notif-wrapper flex flex-row pl-3 hover:bg-gray-200">
    <div class="notif-image">
        <img class="w-16 h-16 rounded-full mt-4" src="https://i.pinimg.com/564x/af/36/ec/af36ecd52b1404909dd3be71c2886d1a.jpg" alt="profile_pic" >
    </div>
    <div class="notif-modal-body modal-body p-4" id="notif-body">
        <p style="font-size: 15px;">{{$notif->title}}</p>
        <p style="opacity: 0.5; font-size: 15px;">{{\Carbon\Carbon::parse($notif->created_at)->diffForHumans()}}</p>
    </div>
    <div class="del-notif">
        {{-- <form method="POST" action="{{ route('notif.del')}}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" id="id" value="{{$notif->id}}">
            <button class="text-red-500 pt-5">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form> --}}
    </div>
</div>
<hr class="mt-0 mb-4" id="user-profile">


