$("#fileUploadImg").fileinput({
  uploadUrl: '#', // you must set a valid URL here else you will get an error
  allowedFileExtensions : ['jpg', 'png','gif'],
  overwriteInitial: false,
  maxFileSize: 1000,
  maxFilesNum: 10,
  //allowedFileTypes: ['image', 'video', 'flash'],
  slugCallback: function(filename) {
    return filename.replace('(', '_').replace(']', '_');
  }
});