<!-- Name -->
<div>
    <x-label for="name" :value="__('Name')" />

    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="isset($user) ? $user->name :  old('name')" required autofocus />
</div>

<!-- Email Address -->
<div class="mt-4">
    <x-label for="email" :value="__('Email')" />

    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="isset($user) ? $user->email : old('email')" required />
</div>

<!-- Phone -->
<div class="mt-4">
    <x-label for="phone" :value="__('Phone Number')" />

    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="isset($user) ? $user->phone : old('phone')" required />
</div>

<!-- Date of Birth -->
<div class="mt-4">
    <x-label for="dob" :value="__('Date Of Birth')" />

    <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="isset($user) ? $user->dob : old('dob')" required />
</div>

<!-- Anniversary -->
<div class="mt-4">
    <x-label for="anniversary" :value="__('Wedding Anniversary')" />

    <x-input id="anniversary" class="block mt-1 w-full" type="date" name="anniversary" :value="isset($user) ? $user->anniversary : old('anniversary')" required />
</div>
