<main class="main container">

    <div class="row justify-content-center align-items-center">
        <form action="" class="bg_blur_light p-4 col-12 col-md-6 my-5 shadow " >
            @csrf
            <i class="fas fa-user-lock fa-3x d-block text-center my-3"></i>
            <h5 class="text-center">فرم ثبت نام</h5>

            <div class="form-group row justify-content-center">
                <input type="email" class="form-control rounded_5 col-10 col-md-8  shadow" placeholder="ایمیل" wire:model="date.email">
            </div>
            @error('date.email')
            <small class="d-block text-danger text-center w-100">{{ $message }}</small><br>
                
            @enderror
            <div class="form-group row justify-content-center">
                <input type="password" class="form-control rounded_5 col-10 col-md-8  shadow" placeholder="کلمه عبور" wire:model="date.password">
            </div>
            @error('date.password')
            <small class="d-block text-danger text-center w-100">{{ $message }}</small><br>
                
            @enderror
            <div class="form-group row justify-content-center">
                <input type="password" class="form-control rounded_5 col-10 col-md-8  shadow"
                    placeholder="تکرار کلمه عبور" name="password_confirmation" id="password_confirmation" wire:model="date.password_confirmation">
            </div>
            <div class="form-group row justify-content-center">
                <input type="checkbox" class="form-control outline_0 box_shadow_0 border-0 h-auto" wire:model="date.policy">
                <a href="#" class="text-info mx-2">قوانین</a> را مطالعه کرده ام
            </div>
            @error('date.policy')
            <small class="d-block text-danger text-center w-100">{{ $message }}</small><br>
                
            @enderror
            <div class="form-group row justify-content-center">
                <button class="btn btn-success rounded_5 px-5 shadow-sm" wire:click="handleRegister" type="button"
          >ثبت نام</button>
            </div>
        </form>

    </div>

</main>
