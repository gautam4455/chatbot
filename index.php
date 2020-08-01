<?php
	date_default_timezone_set('Asia/Kolkata');
	include('db.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Chatbot</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="style.css" rel="stylesheet">
		<script src="assets/jquery/jquery-3.5.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="main">
						<div class="card">
							<div class="card-body chatbox">
								<ul class="list-unstyled clearfix message-list">
									<?php
										$res = mysqli_query($con,"select * from message");
										if(mysqli_num_rows($res)>0) {
											$msg='';
											while($row=mysqli_fetch_assoc($res)) {
												$message=$row['message'];
												$added_on=$row['added_on'];
												$strtotime=strtotime($added_on);
												$time=date('h:i A',$strtotime);
												$type=$row['type'];
												if($type=='User') {
													$class='message-user';
													$imgAvatar='user_avatar.png';
													$name='Me';
												} else {
													$class='message-bot';
													$imgAvatar='bot_avatar.png';
													$name='Chatbot';
												}
												$msg .= '<li class="'.$class.'"><span class="message-img"><img src="image/'.$imgAvatar.'" class="rounded-circle"></span><div class="message-body"><div class="message-header"><strong class="message-title">'.$name.'</strong> <small class="message-time"><span>'.$time.'</span></small></div><p class="message-p">'.$message.'</p></div></li>';
											}
											echo $msg;
										} else {
											?>
											<li class="start-chat">
												<h2 class="text-center">Start Chat</h2>
											</li>
											<?php
										}
									?>
								</ul>
							</div>
							<div class="card-header">
								<div class="input-group">
									<input type="text" name="inputbox" id="inputbox" class="form-control" placeholder="Type your message here...">
									<span class="input-group-append">
										<input type="button" class="btn btn-primary" id="Send" name="Send" value="Send" onclick="send_msg()">
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script>
			function getCurrentTime() {
				var now = new Date();
				var hh = now.getHours();
				var min = now.getMinutes();
				var ampm = (hh>=12)?'PM':'AM';
				hh = hh%12;
				hh = hh?hh:12;
				hh = hh<10?'0'+hh:hh;
				min = min<10?'0'+min:min;
				var time = hh+":"+min+" "+ampm;
				return time;
			}
			function send_msg() {
				$('.start-chat').hide();
				var inputbox = $('#inputbox').val();
				if(inputbox == '') {
					swal({title: "Please enter something!!!"});
				} else {
					var msg = '<li class="message-user clearfix"><span class="message-img"><img src="image/user_avatar.png" class="rounded-circle"></span><div class="message-body"><div class="message-header"><strong class="message-title">Me</strong> <small class="message-time"><span>'+getCurrentTime()+'</span></small></div><p class="message-p">'+inputbox+'</p></div></li>';
					$('.message-list').append(msg);
					$('#inputbox').val('');
					if(inputbox) {
						$.ajax({
							url: 'bot_message.php',
							method: 'post',
							data: 'inputbox='+inputbox,
							success: function(res) {
								var msg = '<li class="message-bot"><span class="message-img"><img src="image/bot_avatar.png" class="rounded-circle"></span><div class="message-body"><div class="message-header"><strong class="message-title">Chatbot</strong> <small class="message-time"><span>'+getCurrentTime()+'</span></small></div><p class="message-p">'+res+'</p></div></li>';
								$('.message-list').append(msg);
								$('.chatbox').scrollTop($('.chatbox')[0].scrollHeight);
							}
						});
					}
				}
			}
		</script>
	</body>
</html>