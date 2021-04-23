<?php 
    require 'template/header.php';
	require './database/bootstrap.php';
	use Database\Boostrap;

	
	$database = new Boostrap();
	$conn = $database->connect();

	$member_sql = "SELECT * FROM members";
	$members = $conn->query($member_sql);
?>

<style>
    .site-name {
        text-decoration: none;
        color: #10327F;
    }
    .thead{
        background-color: #10327F;
        color: white;
    }
    a{
        color: #10327F;
    }
</style>
<link rel="stylesheet" href="bootstrap.css">
<div class="fullwidth-block" data-bg-color="#edf2f4">
<div class="container-fluid" style="margin-top : -20px;">
	<h2 class="section-title" style="color: #10327F;">Members</h2>
	<?php 
		
		if($auth->check_admin()) {
	?>
		<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#addmemberModal">
		Add New Member
		</button>
		<button type="button" class="btn btn-secondary" >
		<a href="edit_users.php" style="color: white;">Edit Users</a>
		</button>
	<?php   
		}
	?>
	<br> <br>
	<div class="modal fade" id="addmemberModal" tabindex="-1" role="dialog" aria-labelledby="addmemberModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadPaperModalLabel">Add New Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="members/addmember.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="introduction" class="col-sm-4 col-form-label">Introduction</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="introduction">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="position">Position</label>
                            <div class="col-sm-8">
                                <input type="text" name="position" id="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Profile Image</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="country">Research Topics</label>
                            <div class="col-sm-8">
                                <input type="text" name="research_topics" id="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="country">Country</label>
                            <div class="col-sm-8">
                                <input type="text" name="country" id="" class="form-control">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="email">Email</label>
                            <div class="col-sm-8">
                                <input type="text" name="email" id="" class="form-control">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="github_link">Github</label>
                            <div class="col-sm-8">
                                <input type="text" name="github_link" id="" class="form-control">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="linkedin_link">Linked In</label>
                            <div class="col-sm-8">
                                <input type="text" name="linkedin_link" id="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="hobby">Hobby</label>
                            <div class="col-sm-8">
                                <input type="text" name="hobby" id="" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
	<div class="row">
	<?php 
		foreach($members as $key => $member) {
	?>
		<div class="col-md-3">
			<div class="team" id="member<?php echo($key+1);?>">
				<img src="member_photos/<?php echo($member["image_path"]);?>" alt="" class="team-image">
				<h3 class="team-name" style="color: #10327F;"><b><?php echo($member["name"])?></b></h3>
				<p><b>Position</b> : <?php echo($member["position"])?></p>
				<p><b>Country</b> : <?php echo($member["country"])?></p>
				<p><?php echo($member["introduction"])?></p>
				<div class="topics"> <b>Research Topics</b> :
					<?php echo($member["research_topics"])?>
				</div> <br>
				<p class="hobby" ><b >Hobby</b> : <?php echo($member["hobby"])?></p>
				<p><b>Email</b> : <?php echo($member["email"])?></p>
				<div class="social-links">
					<a href="<?php echo($member['linkedin_link'])?>"><i class="fa fa-linkedin"></i></a>
					<a href="<?php echo($member['github_link'])?>"><i class="fa fa-github"></i></a>
				</div>


				<?php 
					if(!$auth->check_admin()) {
						if($auth->check_user($member['user_id'])) {
				?>
				<button style="margin: 10px;" type="button" class="btn btn-warning"  data-toggle="modal" data-target="#editmemberModal<?php echo($key)?>" >Edit</button>
				<?php 
						}
					}
				?>
				
				<div class="row" style="padding :5px;">
				<?php 
					if($auth->check_admin()) {
				?>
					<button style="margin: 10px;" type="button" class="btn btn-warning"  data-toggle="modal" data-target="#editmemberModal<?php echo($key)?>" >Edit</button>
				<?php
					}
					if($auth->check_admin()) {
				?>
				<form id="form<?php echo($key+1);?>" method="POST" action="members/deletemember.php">
					<input type="hidden" name="id" value="<?php echo($member['id'])?>">
					<button style="margin: 10px;" class="btn btn-danger" onclick="delete_member(<?php echo($member['id'])?> ,this)">Delete</button>	
				</form>
				<?php } ?>
				</div>
				
			</div>
		</div>
		<div class="modal fade" id="editmemberModal<?php echo($key)?>" tabindex="-1" role="dialog" aria-labelledby="editmemberModal<?php echo($key)?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadPaperModalLabel">Edit Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="members/editmember.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" value="<?php echo($member['id'])?>" name="id">
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" value="<?php echo($member['name'])?>">
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="introduction" class="col-sm-4 col-form-label">Introduction</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="introduction" value="<?php echo($member['introduction'])?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="position">Position</label>
                            <div class="col-sm-8">
                                <input type="text" name="position" id="" class="form-control" value="<?php echo($member['position'])?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Profile Image</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="image" >
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="country">Research Topics</label>
                            <div class="col-sm-8">
                                <input type="text" name="research_topics" id="" class="form-control" value="<?php echo($member['research_topics'])?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="country">Country</label>
                            <div class="col-sm-8">
                                <input type="text" name="country" id="" class="form-control" value="<?php echo($member['country'])?>">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="email">Email</label>
                            <div class="col-sm-8">
                                <input type="text" name="email" id="" class="form-control" value="<?php echo($member['email'])?>">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="github_link">Github</label>
                            <div class="col-sm-8">
                                <input type="text" name="github_link" id="" class="form-control" value="<?php echo($member['github_link'])?>">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="linkedin_link">Linked In</label>
                            <div class="col-sm-8">
                                <input type="text" name="linkedin_link" id="" class="form-control" value="<?php echo($member['linkedin_link'])?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="hobby">Hobby</label>
                            <div class="col-sm-8">
                                <input type="text" name="hobby" id="" class="form-control" value="<?php echo($member['hobby'])?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
	<?php	
	}
	?>
	
<script>
	function edit_form(button , id) {
		alert(id);
		var member_div = document.getElementById("member"+id);
        var paper_div_fields = paper_div.childNodes;
        for(var a=1; a<=4; a++)  {
            values = paper_div_fields[a].innerHTML;
            paper_div_fields[a].innerHTML = '<input type="text" id="'+paper_div_fields[a].className+a+'" value="'+values+'">'
        }
        button.classList.remove("btn-secondary");
        button.classList.add("btn-success");
        button.innerHTML = "Confirm";
        button.setAttribute("onClick","confirm_edit("+id+",this)");
	}
	function delete_member(id, button ){
        var form = document.getElementById("form"+id);
        if (confirm('Confirm Delete?')) {
            form.setAttribute("action","members/deletemember.php");
            button.setAttribute("type","submit");
        }
    }
</script>
</div> <!-- .container -->
</div>
<?php
    require 'template/footer.php';
?>