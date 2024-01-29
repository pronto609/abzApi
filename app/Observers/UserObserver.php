<?php

namespace App\Observers;

use App\Models\User;
use App\Service\Resizer;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserObserver
{

    public function __construct(
        private Resizer $resizer,
        private string $imageDir = 'users',
        private string $createdPath = ''
    ) {
    }

    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        if ($user->photo instanceof \Illuminate\Http\UploadedFile) {
            $user->photo = $this->fileResise($user->photo, $user);
        }
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }

    private function fileResise(UploadedFile $file, User $user = null)
    {
        $path = $this->prepareDir();
        if ($user) {
            $filename = Str::uuid() . "_" .$file->getClientOriginalName();
            $originFile = file_get_contents($file);
            $this->resizer->resizeFromBuffer($filename, $originFile,$path.'/'.$filename);
        }
        return $path;
    }

    private function prepareDir(): string
    {
        $path = public_path($this->imageDir);
        if ($this->createdPath) {
            return $this->createdPath;
        }
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
            $this->createdPath = $path;
            return $this->createdPath;
        }
        return $path;
    }
}
