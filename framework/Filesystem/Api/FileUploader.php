<?php
	namespace Framework\Filesystem\Api;
	use Framework\Filesystem\Api\FileUploaderInterface;

	class FileUploader implements FileUploaderInterface{
		public $file;
		public $origName;
		public $uploadDir;
		public $allowedFormats;
		public $maxSize;
		/** Set file from request */
	    public function setFile($file): void{
	    	if (is_uploaded_file($file)){
	    	$this->file = $file;
	   		}
	    }

	    public function setOrigName(string $name): void{
	    	$this->origName = $name;
	    }

	    /** Path where upload file */
	    public function setDir(string $path): void{
	    	$this->uploadDir = $path;
	    }

	    /** Add allow formats for uploading files */
	    public function addAllowedFormats(array $allowedFormats): void{
	    	$this->allowedFormats = $allowedFormats;
	    }

		/** Get size for uploading files in MB */
	    public function getSize(): int{
	    	$size=ceil(filesize($this->file) / 1000000);
	    	return $size;
	    }

		/** Set max size for uploading files in MB */
		public function setMaxSize(int $size): void{
			$this->maxSize = $size;
		}

		/** Return file mime type, for example image/jpeg */
		public function getMimeType(): string{
			if (!empty($this->file)){
				return mime_content_type($this->file);
			}
			else{
				return 'Спочатку скористайтесь ->setFile(string $file)!';
			}
		}

		/** Upload file to the filesystem */
		public function uploadFile(): bool{
			if($this->getSize()<=$this->maxSize){
				if(in_array($this->getMimeType(), $this->allowedFormats)){
					if (move_uploaded_file($this->file, $this->uploadDir.'/'.$this->origName)) {
    					return 'Файл успішно завантажений.';
					}
				}
				else{
					return 'Не вірний формат файлу!';
				}
			}
			else{
				return 'Розмір файлу завеликий!';
			}
		}
	}
?>