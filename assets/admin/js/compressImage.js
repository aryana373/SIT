function resize(file) {
    // Create an image
    var img = document.createElement("img");
    // Create a file reader
    var reader = new FileReader();
    // Set the image once loaded into file reader
    reader.onload = function(e)
    {
        img.src = e.target.result;

        var canvas = document.createElement("canvas");
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);

        var MAX_WIDTH = 1600;
        var MAX_HEIGHT = 1600;
        var width = img.width;
        var height = img.height;

        if (width > height) {
          if (width > MAX_WIDTH) {
            height *= MAX_WIDTH / width;
            width = MAX_WIDTH;
          }
        } else {
          if (height > MAX_HEIGHT) {
            width *= MAX_HEIGHT / height;
            height = MAX_HEIGHT;
          }
        }
        canvas.width = width;
        canvas.height = height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, width, height);

        dataurl = canvas.toDataURL("image/jpeg"); 
    }
    // Load files into file reader
    reader.readAsDataURL(file);
}
    // Post the data
    /*
    var fd = new FormData();
    fd.append("name", "some_filename.jpg");
    fd.append("image", dataurl);
    fd.append("info", "lah_de_dah");
    */