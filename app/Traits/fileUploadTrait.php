<?php
/**
 * Created By DhanPris
 *
 * @Filename     fileUploadTrait.php
 * @LastModified 7/9/18 10:11 PM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

trait fileUploadTrait
{
    /**
     * @var string
     */
    protected $uploadPath = 'uploads';

    /**
     * @var
     */
    public $folderName;

    /**
     * @var string
     */
    // public $rule = 'image|max:2000';
    public $rule = 'image|max:20000';

    /**
     * @var string
     */
    public $deleteUrl = '';

    /**
     * @return bool
     */
    private function createUploadFolder(): bool
    {
        if (!file_exists(config('filesystems.disks.public.root') . '/' . $this->uploadPath . '/' . $this->folderName)) {
            $attachmentPath = config('filesystems.disks.public.root') . '/' . $this->uploadPath . '/' . $this->folderName;
            mkdir($attachmentPath, 0755, true);

            Storage::disk('s3')->put('public/' . $this->uploadPath . '/' . $this->folderName . '/index.html', 'Silent Is Golden');

            return true;
        }

        return false;

    }

    /**
     * For handle validation file action
     *
     * @param $file
     * @return fileUploadTrait|\Illuminate\Http\RedirectResponse
     */
    private function validateFileAction($file)
    {

        $rules = array('fileupload' => $this->rule);
        $file  = array('fileupload' => $file);

        $fileValidator = Validator::make($file, $rules);

        if ($fileValidator->fails()) {

            $messages = $fileValidator->messages();

            return redirect()->back()->withInput(request()->all())
                ->withErrors($messages);

        }
    }

    /**
     * For Handle validation file
     *
     * @param $files
     * @return fileUploadTrait|\Illuminate\Http\RedirectResponse
     */
    private function validateFile($files)
    {

        if (is_array($files)) {
            foreach ($files as $file) {
                return $this->validateFileAction($file);
            }
        }

        return $this->validateFileAction($files);
    }

    /**
     * For Handle Put File
     *
     * @param $file
     * @return bool|string
     */
    private function putFile($file)
    {
        $fileName = preg_replace('/\s+/', '_', time() . ' ' . $file->getClientOriginalName());
        $path     = $this->uploadPath . '/' . $this->folderName.'/';

        if (Storage::disk('s3')->putFileAs('public/' . $path, $file, $fileName)) {
            return config('filesystems.disks.s3.url').'/public/' . $path . $fileName;
        }

        return false;
    }

    /**
     * For Handle Save File Process
     *
     * @param $files
     * @return array
     */
    public function saveFiles($files)
    {
        $data = null;

        if($files != null){

            $this->validateFile($files);

            $this->createUploadFolder();

            if (is_array($files)) {

                foreach ($files as $file) {
                    if(is_object($file)){
                        $data[] = $this->putFile($file);
                    }
                }

            } else {

                $data = $this->putFile($files);
            }

        }

        return $data;
    }

    public function deleteFiles($url)
    {
        $this->deleteUrl = str_replace(config('filesystems.disks.s3.url').'/','',$url);

        // dd(Storage::disk('s3')->exists($this->deleteUrl));
        // dd($this->deleteUrl);

        # check if url not empty
        if(empty($this->deleteUrl))
        {
            // dd('uups.!!! file not found...');
            return false;
        }
        # check if file exist
        else if (Storage::disk('s3')->exists($this->deleteUrl))
        {
            # check if success delete file
            if (Storage::disk('s3')->delete($this->deleteUrl))
            {
                # success delete file
                return true;
            }
        } else {
//            dd('error found. please contact administrator');
            #if no file exist or another status
            return true;
        }
    }
}
