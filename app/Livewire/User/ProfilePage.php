<?php

namespace App\Livewire\User;

use App\Livewire\Navbar;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

#[Layout('layouts.app')]
class ProfilePage extends Component
{
    public $name, $email, $phone, $url, $newPassword, $oldPassword, $addAddress = false, $addressId, $editAddress= false;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;

        $images = ["/assets/image1.jpeg", "/assets/image2.jpeg",  "/assets/image3.jpeg","/assets/image4.jpeg","/assets/image5.jpeg","/assets/image6.jpeg","/assets/image7.jpeg","/assets/image8.jpeg","/assets/image9.jpeg","/assets/image10.jpeg"];
        $this->url = $images[array_rand($images)];


    }




    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'min:10',
        ]);

        auth()->user()->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);


        $this->dispatch(
            'alert',
            type:'success',
            title:'Profile Updated'
        );
    }

    public function changePassword()
    {
        $this->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8',
        ]);


        if (Hash::check($this->oldPassword, auth()->user()->password)) {
            auth()->user()->update([
                'password' => Hash::make($this->newPassword),
            ]);

            $this->dispatch(
                'alert',
                type:'success',
                title:'Password changed successfully'
            );
        } else {
            $this->dispatch(
                'alert',
                type:'error',
                title:'Incorrect password'
            );
        }
    }

    public function delete($data)
    {
        $this->addressId = $data;
        $address = auth()->user()->address()->find($this->addressId);

        if ($address) {
            $address->delete();

            $this->dispatch(
                'alert',
                type:'success',
                title:'Address deleted successfully'
            );
        } else {

            $this->dispatch(
                'alert',
                type:'error',
                title:'Could not delete address'
            );
        }
    }


    protected $listeners = ['addressAdded' => 'closeModal', 'editDone'=>'closeEditModal'];




    public function closeModal()
    {
        $this->addAddress = false;
    }

    public function closeEditModal()
    {
        $this->editAddress = false;
    }

    public function render()
    {
        return view('livewire.user.profile-page', [
            'addresses' => auth()->user()->address,
            'url' => $this->url
        ]);
    }
}
