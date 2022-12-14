<main class="main container">
    <div class="row my-4">
        {{-- ----content------------------ --}}
        <div id="articleRight" class="col-12 col-md-8 col-xl-9">
            <div class="p-2 bg-light rounded">
                <h1 class="text-center font_2 py-2">{{ $article->h_title }}</h1>
                <div class="image text-center">
                    <img src="{{ $article->image }}" style="width:100%;" alt="{{ $article->alt_image }}">
                </div>
                <div class="p-2 text_container">
                    {!! $article->text !!}
                </div>
            </div>

        </div>
        {{-- ----------sidebar--------------------- --}}
        <div id="articleLeft" class="col-12 col-md-4 col-xl-3 mt-3 mt-md-0">
            <div class="row bg-light px1 py-5 text-center justify-content-center d-flex rounded w-100 m-auto">
                <div class="image rounded-circle overflow-hidden h_10 w_10 text-center justify-content-center">
                    <img class="max_w_100 m-auto" src="{{ $article->user->image }}" alt="{{ $article->user->name }}">
                </div>

                <div class="col-12 mt-3 justify-content-center">
                    <small class="text-center d-block">نویسنده:</small>
                    <h6 class="text-center">{{ $article->user->name . ' ' . $article->user->lastname }}</h6>

                    <small class="text-center d-block mt-3">تاریخ:</small>
                    <h6 class="text-center">{{ $article->created_at->diffForHumans() }}</h6>

                    <div class="col-12 justify-content-center text-center mt-3">
                        <span class="text-center">بازدید : {{ $article->view_count }} </span>
                    </div>

                    <div class="col-12 justify-content-center text-center mt-3">
                        <a href="#" class="btn rounded_5 btn-outline-dark">دیگر مقالات </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- --------comment------------------- --}}
    <div class="row justify-content-center align-items-center alert-secondary p-3">

        <div class="row p-3 justify-content-center text-right alert-light d-block mb-4 col-12">
            @foreach (explode('-', $article->keywords) as $key)
                <a href="#" class="p-3 bg-success border-radius m-2 btn rounded">
                    {{ $key }}
                </a>
            @endforeach
        </div>
        @if (Auth::check())
            <div class="col-12 row justify-content-center form-group">


                <h5 class="col-12 text-center">{{ $isAnswer ? 'متن پاسخ' : 'متن نظر' }}</h5>
                <textarea rows="10"
                    class="form-control rounded shadow col-12 col-md-8 {{ $isAnswer == 1 ? 'alert-warning' : '' }}"
                    wire:model="comment_text"></textarea>
                @error('comment_text')
                    <small class="d-block text-danger text-center w-100">{{ $message }}</small><br>
                @enderror
                <div class="text-center col-12">
                    @if ($isAnswer == 1)
                        <button class="btn btn-success rounded-5 mt-3" type="button" wire:click="addAnswer">
                            ثبت پاسخ
                        </button>
                        <button class="btn btn-warning rounded-5 mt-3" type="button" wire:click="cancelAnswer">
                            انصراف
                        </button>
                    @else
                        <button class="btn btn-success rounded-5 mt-3" type="button" wire:click="addComment">
                            ثبت نظر
                        </button>
                    @endif

                </div>


            </div>
        @else
            <p class="text-primary text-center ">
                <a href="{{ route('login') }}">لطفا جهت ثبت نظر وارد شوید </a>
            </p>
        @endif


        <div class="col-12 col-md-11 bg-white p-3">
            @foreach ($comment as $com)
                <div class="row my-2 d-block p-2 rounded shadow-sm border_1 col-11 m-auto shadow">
                    <div class="row justify-content-lg-between w-100 m-auto">
                        <h6 class="text-right text-success">{{ $com->user->name }} در تاریخ
                            <span class="text-danger">
                                {{ $com->created_at->diffForHumans() }}</span>
                        </h6>
                        @if ($com->user_id == Auth::user()->id)
                            <span>
                                <i class="fas fa-trash text-danger cursor_pointer_text_shadow mx-2"
                                    wire:click="commentDelete({{ $com->id }})"></i>
                                <i class="fas fa-edit text-success cursor_pointer_text_shadow mx-2"></i>
                            </span>
                        @endif

                    </div>
                    <div class=" w-100 pb-3">
                        <p class="text-justify">
                            {{ $com->text }}
                        </p>

                        <button class="btn btn-primary rounded_5 px-3 "
                            wire:click="getCommentToAnswer({{ $com }})">پاسخ</button>



                    </div>
                    @foreach ($answer as $ans)
                        @if ($ans->parent_id == $com->id)
                            <div class="answer shadow-sm alert-success p-2">
                                <h6 class="text-right text-primary">پاسخ</h6>
                                <div class="row justify-content-lg-between w-100 m-auto">
                                    <h6 class="text-right text-info">{{ $ans->user->name }} در تاریخ
                                        <span class="text-danger">
                                            {{ $ans->created_at->diffForHumans() }}</span>
                                    </h6>
                                    @if ($com->user_id == Auth::user()->id)
                                        <span>
                                            <i class="fas fa-trash text-danger cursor_pointer_text_shadow mx-2"
                                                wire:click="commentDelete({{ $ans->id }})"></i>
                                            <i class="fas fa-edit text-success cursor_pointer_text_shadow mx-2"></i>
                                        </span>
                                    @endif
                                </div>
                                <p>
                                    {{ $com->text }}
                                </p>
                            </div>
                        @endif
                    @endforeach

                </div>
            @endforeach

        </div>
    </div>

</main>
