<div wire:poll>
    <div class="container">
        <h3 class=" text-center mb-2">

            @if (auth()->user()->email == 'admin@gmail.com')
                <a class="btn btn-primary" href="{{ Url('delete_chat') }}">Delete</a>
            @endif

        </h3>
        <div class="messaging flex justify-center  ">
            <div class="inbox_msg">
                <div class="border p-10">
                    <div id="chat" class="msg_history">
                        @forelse ($messagee as $message)

                            @if ($message->user->name == auth()->user()->name)
                                <!-- Reciever Message-->
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p class="text-left bg-blue-700 rounded text-light p-3">{{ $message->comments }}</p>
                                        <span class="time_date">
                                        {{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                    </div>
                                </div>

                            @else

                                <div class="incoming_msg">{{ $message->user->name }}
                                    <div class="incoming_msg_img"> <img
                                            src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p class="bg-blue-700">{{ $message->comments }}</p>
                                            <span
                                                class="time_date">{{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @empty
                            <h5 style="text-align: center;color:red"> No messages</h5>
                        @endforelse

                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <form wire:submit.prevent="sendMessage">
                                <input onkeydown='scrollDown()' wire:model.defer="commentss" type="text"
                                    class="" placeholder="enter text..." />
                                <button class="bg-blue-700 text-light rounded p-2" type="submit">Send</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
