<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Avatar | Rhapsody Online Prayer Conference 2020</title>
  <script src="jquery.js"></script>
	<script src="croppie.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
  <link rel="stylesheet" href="bootstrap-3.min.css">
  <link rel="stylesheet" href="croppie.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Join the Global Rhapsody Online Prayer Conference, a 24-hour prayer event from 26-27th February 2021. You will be refreshed and positioned to set new records for the Gospel.  Register now and send your prayer requests on this website or on the Rhapsody app.  Rhapsody of Realities Christian Daily Devotional, by Pastor Chris Oyakhilome is the #1 Bible study guide in the world.">
	<meta name="keywords" content="Rhapsody Online Prayer Conference, ROPC, Daily Devotional, Devotional, Devotions, Christian Devotionals, Rhapsody of Realities, Pastor Chris Oyakhilome, Pastor Chris, Chris Oyakhilome, Rhapsody, Daily Devotional, God, Jesus, Christ Embassy, church, Distribution, confessions, holy spirit, In Touch Magazine, In Touch Devotional, Rhapsody of Realitiesh Daily Devotion, Rhapsody of Realities Devotions, Daily Devo, Daily Devotional, Daily Devotion, Devotion, devotional, magazine, charles stanley, christian magazine, Rhapsody of Realities Magazine, Rhapsody of Realities Devotional, Rhapsody of Realities Daily Devotion, Rhapsody of Realities Daily Devotions, Daily Devo, Daily Devotional, Daily Devotion, Devotion, devotional, magazine, charles stanley, christian magazine, Rhapsody of Realities Magazine, Rhapsody of Realities Devotional,Rhapsody of Realities Devotion, Rhapsody of Realities Devotions, Daily Devo, Daily Devotional, Daily Devotion, Devotion, devotional, magazine, Benny Hinn, blog, Rhapsody of Realities blog, christian magazine">

</head>
<body>


<div class="container">
	<div class="panel panel-default">
	  <div class="panel-heading">Create Avatar</div>
	  <div class="panel-body">


	  	<div class="row">
	  		<div class="col-md-4 text-center">
					<div id="upload-demo" style="width:350px"></div>
				</div>
				
	  		<div class="col-md-4" style="padding-top:30px;">
					<strong>STEP 1 : Select Image and adjust to fit</strong>
					<br/>
					<input type="file" id="upload">
					<br/>
					<strong>STEP 2 :</strong>
					<button class="btn btn-success upload-result">Upload Image</button><br><br>
					<center><span id="spinner" style="display: none;"><i class="fa fa-spinner fa-spin fa-2x"></i></span></center>
				</div>
				
	  		<div class="col-md-4">
					<div id="upload-demo-i" style="background:url('ropc-min.jpg'); background-size: 300px 300px; width:300px;height:300px;margin-top:30px"></div> 
				</div>	
	  	</div>


	  </div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
<script type="text/javascript">
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 300,
        height: 300,
        type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
});


$('#upload').on('change', function () { 
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    	
    }
    reader.readAsDataURL(this.files[0]);
});


$('.upload-result').on('click', function (ev) {
	// show loading
	$('#spinner').css("display", "block");
	console.log('Uploading image');
	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {
		$.ajax({
			url: "ajaxpro.php",
			type: "POST",
			data: {"image":resp},
			dataType:'JSON',
			success: function (data) {
				console.log(data)
				$('#spinner').css("display", "none"); 
				 console.log('response ='+data.img);
				//html = '<img src="' + resp + '" />';
				//$("#upload-demo-i").html(html);
				html = '<img width="300px" src="' + data.img + '" /><a href=" '+data.img+' " download><button style="margin-top: 10px" class="btn btn-danger upload-result">Download Avatar</button></a> <a href="../index.php"><button style="margin-top:50px; margin-bottom:100px" class="btn btn-info upload-result">Proceed to Rhapsody Official Website</button></a>';
				$("#upload-demo-i").html(html);
			},
			error: function (error) {
				console.log(error)
				console.error('Error occured: ', error);
			}
		});
	});
});


</script>
<!-- html = '<img width="300px" src="' + data.img + '" /><a href=" '+data.img+' " download><button style="paddint-top:20px" class="btn btn-danger upload-result">Download Avatar</button></a>'; -->

</body>
</html>