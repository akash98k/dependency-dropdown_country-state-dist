<?php
include('connect.php');
$qry = "SELECT `id`, `countryName` FROM `country`";
$stmt = $con->prepare($qry);
$stmt->execute();
$arrCity=$stmt->fetchAll(PDO::FETCH_ASSOC);
// $run = mysqli_query($conn, $qry);
// $data = mysqli_fetch_assoc($run);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
</head>
<body>

<div class="container">
    <form action="">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="country">Country</label>
                    <select name="country" class="form-control" id="country">
                        <option value="">Select Country</option>
                        <?php
                        foreach($arrCity as $country){
                            ?>
                            <option value="<?php echo $country['id']?>"><?php echo $country['countryName']?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="state">State</label>
                    <select name="state" class="form-control" id="state">
                        <option value="">Select State</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="city">City</label>
                    <select name="city" class="form-control" id="city">
                        <option value="">Select City</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="divLoading"></div>
    

<script>
    $(document).ready(function () {
        jQuery('#country').change(function(){
            var id=jQuery(this).val();
            jQuery.ajax({
                type:'post',
                url:'get_data.php',
                data:'id='+id,
                success:function (result) {
                    jQuery('#state').html(result);
                }
            });
        });
        jQuery('#state').change(function(){
            var sid=jQuery(this).val();
            jQuery.ajax({
                type:'post',
                url:'get_data.php',
                data:'sid='+sid,
                success:function (result) {
                    jQuery('#city').html(result);
                }
            });
        });
    });
</script>
</body>
</html>