<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="fonts/icomoon/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/bootstrap-datepicker.css">
<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
<link rel="stylesheet" href="css/aos.css">
<link rel="stylesheet" href="css/style.css"> -->
</head>
<body>
    
<div class="container">

<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h4 class="text-center">VIEW SCHEDULES</h4>
            <a href="index.php" class="btn btn-primary"><span>Back To Home Page</span></a>
        </div>
        <div class="card body">
            <div class="row">
                <div class="col-md-12 msg" ></div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <th colspan="2">All Files</th>
                </thead>
               
            
                <?php 
                $myFile = "uploads/database.txt";
                $myFileLink = fopen($myFile, 'r');
                if(filesize($myFile) > 0)
                   { 
                $myFileContents = fread($myFileLink, filesize($myFile));
                fclose($myFileLink);
                    $database=  (explode('|', $myFileContents));
                    foreach ($database as $key => $data) 
                    { 
                        if($data!='')
                        {
                     ?>
                        <tr class="r<?= $key?>">

                             <td>
                                <a href="uploads/<?php echo $data;?>">
                                    <?php echo $data;?>
                                </a>
                             </td>
                             <td>
                                    <a href="uploads/<?php echo $data;?>" class="btn btn-info btn-sm" target="_blank"> View </a>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?=$key ?>">
                                              Delete
                                            </button>
                                     <div class="modal " id="myModal<?=$key ?>" tabindex="-1" role="dialog">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title">Alert</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <p>Are you Want to Delete File .</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary delete_rec" data-id="<?= $data?>" data-number="<?= $key ?>">Delete</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                            </td>
                             <!-- <td><a href="delete.php?file=<?php echo $data;?>">delete</a></td> -->
                         </tr>

                    <?php 
                    } }}
                    else
                    echo "<tr><td class='text-danger'>Files not Found</td></tr>";
            ?>
            </table>

        </div>
    </div>
    </div>
</div>

    
</div>
<script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
    function deleterecord(data){
    // $(".myModal").modal('show');
    }
    $('body').on('click','.delete_rec',function(){
        // alert('click trigger');
        $('.msg').empty();
        var file_name=$(this).data('id');
        var no=$(this).data('number');
        $.ajax({
                method:'post',
                data:{file_name:file_name},
                url: "delete.php", 
                success: function(result){
                // $("#div1").html(result);/
                console.log(result);
                result=jQuery.parseJSON(result);
                $('#myModal'+no).modal('toggle');
                if(result.success=='true')
                {
                   console.log('testing');
                $('.r'+no).remove();


                    $('.msg').append('<div class="alert alert-success" role="alert">'+result.message+ '</div>')
                }else
                    $('.msg').append('<div class="alert alert-primary" role="alert">'+result.message+ '</div>')
                },
                error:function(result){

                }
            });
    });

</script>
</body>
</html>