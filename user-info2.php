<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>User Info</title>
    <link rel="stylesheet" href="user-info2.css">
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>


  </head>
<body>
  <div class="wrapper">    
    <h1> Add more info </h1>
      <form action="./user-info2DB.php" method="POST">
          <span class="fileName" class="text-primary " style="margin-left: -100px; margin-right: 60px;"></span>
          <select class="select">
            <option value="">Drive Licence</option>   
          </select> 
            <input  class="input" name="drive-license" id="entry_value" ref="fileInput" type="file"  onchange="getFileName()">
           
              <div class="form">
                <div class="img-label">
                  <img src="upload.png">
                  <label for="text" class="upload"> Upload your files here </label> 
                </div>
              </div>
        
              <span class="fileName" class="text-primary "></span>
              
        
            <select class="select2">
              <option value=""> Passport </option>
              <input  class="input" name="passport" id="entry_value" ref="fileInput" type="file"  onchange="getFileName()">
              
          </select>
            <div class="form">
              <div class="img-label">
                <img src="upload.png">
                <label for="text" class="upload" >Upload your files here </label> 
              </div>
              <div class="formsdiv">
            
              </div>
              <div class="img-label">
              </div>  
            </div> 
            <button type="submit" name="submit"> Send Code </button>
        </form>
      </div>    
      </div>
    </div>
    <script>
      function getFileName()
    {
    var x = document.getElementById('entry_value')
    document.getElementById('fileName').innerHTML = x.value.split('\\').pop()
    }
    </script>
  </body>
</html>

