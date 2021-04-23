<?php
require 'template/header.php';
require './database/bootstrap.php';
use Database\Boostrap;

  
    $database = new Boostrap();
    $conn = $database->connect();
    
    // for ($i=1; $i <= 30; $i++) { 
    //     $paper_insert_sql =  "INSERT INTO papers (title, file_path, authors, general_keywords, specific_keywords) VALUES ('Super $i', 'paper.pdf', 'Super $i', 'General $i, General B', 'Specific $i, Specific A')";
    //     $conn->query($paper_insert_sql);
    // }
    
   //get current page id 
   
    if (isset($_GET['page'])) {

        $page_id = $_GET['page'];

    } else {

        $page_id = 1;

    }

    $offset = ($page_id * 20)-20;

   //get current page id 

   //check if filtered or not 

    $filtered = $_SESSION['filtered'];
    
    if(!($filtered)) {

    //check if there is pagination in place WITHOUT search (filtering)

        $count_sql = "SELECT COUNT(*) FROM papers";
        $count = mysqli_fetch_array($conn->query($count_sql));
        $count = $count[0];
        $page_count = ceil($count/20);

        $paper_sql = "SELECT * FROM papers LIMIT $offset,20";

        if($page_id == 1) {

            $paper_sql = 'SELECT * FROM papers LIMIT 20';
            
        }

    //check if there is pagination in place WITHOUT search (filtering)
    
    } else {

    //check if there is pagination in place WITH search (filtering)

    $authors = $_SESSION['filtered_items']['authors'];
    $title = $_SESSION['filtered_items']['title'];
    $general_keywords = $_SESSION['filtered_items']['general_keywords'];
    $specific_keywords = $_SESSION['filtered_items']['specific_keywords'];

    $count_sql = "SELECT COUNT(*) FROM papers where title LIKE '%$title%' AND authors LIKE '%$authors%' AND general_keywords LIKE '%$general_keywords%' AND specific_keywords LIKE '%$specific_keywords%'";
    $count = mysqli_fetch_array($conn->query($count_sql));
    $count = $count[0];
    $page_count = ceil($count/20);

    $paper_sql = "SELECT * FROM papers where title LIKE '%$title%' AND authors LIKE '%$authors%' AND general_keywords LIKE '%$general_keywords%' AND specific_keywords LIKE '%$specific_keywords%' LIMIT $offset, 20";
    
    if($page_id == 1) {
       
        $paper_sql = "SELECT * FROM papers where title LIKE '%$title%' AND authors LIKE '%$authors%' AND general_keywords LIKE '%$general_keywords%' AND specific_keywords LIKE '%$specific_keywords%' LIMIT 20";

    }
    //check if there is pagination in place WITH search (filtering)

    }
   //check if filtered or not

   
    
    $papers = $conn->query($paper_sql);
    mysqli_fetch_assoc($papers);

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

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
<div class="news-div">
    <div class="filter">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#filterModal">
        Filter Results
        </button>
    <?php if($filtered) { ?>
        <br> <br>
        <!-- Button trigger modal -->
        <form action="papers/clearsearch.php">
            <button type="submit" class="btn btn-danger">
            Clear Filter Results
            </button>
        </form>
    <?php } ?>
    </div>
     <br>
    <?php 
        if($auth->check()) {   
    ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadPaperModal">
    Upload Paper
    </button>
<!-- Paper Upload Modal -->
        <div class="modal fade" id="uploadPaperModal" tabindex="-1" role="dialog" aria-labelledby="uploadPaperModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadPaperModalLabel">Upload Paper</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="papers/uploadpaper.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Title</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="author_id">Author Names</label>
                            <div class="col-sm-8">
                                <input type="text" name="authors" id="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Paper</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="paper">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="general_keywords">General Keywords</label>
                            <div class="col-sm-8">
                                <input type="text" name="general_keywords" id="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="specific_keywords">Specific Keywords</label>
                            <div class="col-sm-8">
                                <input type="text" name="specific_keywords" id="" class="form-control">
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
<!-- Paper Upload Modal -->
    <?php } ?>
<!-- Filter Modal -->
        <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter Results</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="papers/searchpaper.php" method="POST">
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Title</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Author Name</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="authors">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="general_keywords">General Keywords</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="general_keywords">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="specific_keywords" class="col-sm-4 col-form-label">Specific Keywords</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="specific_keywords">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="search" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
<!-- Filter Modal -->
<br>
<br>
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Paper Title</th>
      <th scope="col">Authors</th>
      <th scope="col">General Keywords</th>
      <th scope="col">Specific Keywords</th>
      <th colspan="3">Action</th>
    </tr>
  </thead>
  <tbody>
   
    <?php
        foreach($papers as $key => $paper) {
            if($offset) {
                $key = $key + $offset;
            }
            print('<tr id="paper'.$paper['id'].'">');
            print('<td scope="row">'.($key+1).'</td>');
            print('<td class="title">'.$paper['title'].'</td>');
            print('<td class="authors">'.$paper['authors'].'</td>');
            print('<td class="general_keywords">'.$paper['general_keywords'].'</td>');
            print('<td class="specific_keywords">'.$paper['specific_keywords'].'</td>');
            print(' <td><button class="btn btn-warning"> <a href="uploaded_papers/'.$paper['file_path'].'" download>Download</a></button></td>');
            if($auth->check()){
                print('<form id="form'.$paper['id'].'" method="POST">');
                print("<input type='hidden' name='id' value=".$paper['id'].">");
                print(' <td><button type="button" id="edit'.$paper['id'].'" class="btn btn-secondary" onClick="edit_paper('.$paper['id'].',this)"> Edit</button></td>');
                print(' <td><button class="btn btn-danger" onClick="delete_paper('.$paper['id'].', this)"> Delete</button></td>');
                print("</form>");
            }
            print('</tr>');
        }
    ?>
  </tbody>
</table>
<!-- pagination -->
            <nav aria-label="Page navigation example">
            <ul class="pagination" style="color: #FFFFFF;">
                <li class="page-item">
                <form action="papers.php" method="get">
                    <input type="hidden" name="page" value="1">
                    <button class="page-link" type ="submit">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </button>
                </form>
                </li>
            <?php
                    if($page_count <= 5) {
                        for($a = 1; $a <= 5 ; $a++) {
                            if($a <= $page_count) {
                                if($a == $page_id) {
                                    print('<li class="page-item active">');
                                } else {
                                    print('<li class="page-item">');
                                }
                                print('<form action="papers.php">');
                                print('<input type="hidden" name="page" value="'.$a.'">');
                                print('<button class="page-link" type="submit">'.$a.'</button>');
                                print('</form> </li>');
                            }
                        }
                    } else if ($page_id >= $page_count-4) {

                        if($page_id == $page_count-4) {

                            for($a = -1; $a<=3 ; $a++) {
                                
                                if($page_id == $page_count-4+$a) {
                                    print('<li class="page-item active">');
                                } else {
                                    print('<li class="page-item">');
                                }
                                print('<form action="papers.php">');
                                print('<input type="hidden" name="page" value="'.($page_id+$a).'">');
                                print('<button class="page-link" type="submit">'.($page_id+$a).'</button>');
                                print('</form> </li>');
                            }
                        } else {

                            for($a = 1; $a <= 5; $a++) {
                                if($page_count-5+$a == $page_id) {
                                    print('<li class="page-item active">');
                                } else {
                                    print('<li class="page-item">');
                                }
                                print('<form action="papers.php">');
                                print('<input type="hidden" name="page" value="'.($page_count-5+$a).'">');
                                print('<button class="page-link" type="submit">'.($page_count-5+$a).'</button>');
                                print('</form> </li>');
                            }
                        }
                      
                    } else {

                        for($a = -1; $a <= 2; $a++) {
                                if($page_id + $a == 0) {

                                } else {
                                    if($a == 0) {
                                        print('<li class="page-item active">');
                                    } else {
                                        print('<li class="page-item">');
                                    }
                                    print('<form action="papers.php">');
                                    print('<input type="hidden" name="page" value="'.($page_id+$a).'">');
                                    print('<button class="page-link" type="submit">'.($page_id+$a).'</button>');
                                    print('</form></li>');
                                }
                                
                        }
                        print('<li class="page-item">');
                        print('<button class="page-link" type="submit"> ... </button>');
                        print('</li>');
                        print('<li class="page-item">');
                        print('<form action="papers.php">');
                        print('<input type="hidden" name="page" value="'.$page_count.'">');
                        print('<button class="page-link" type="submit">'.$page_count.'</button>');
                        print('</form></li>');
                    }
            ?>
                <li class="page-item">
                <form action="papers.php" method="get">
                <?php
                    print('<input type="hidden" name="page" value="'.$page_count.'">');
                ?>
                    <button class="page-link" type="submit" aria-label="Previous">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </button>
                </form>
               
                </li>
            </ul>
            </nav>
<!-- pagination -->
</div>
<script>
    //make table cell showing paper editable
    function edit_paper(id , button) {
        var paper_div = document.getElementById("paper"+id);
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

    //send edited fields to server
    function confirm_edit(id, button){

        var form = document.getElementById("form"+id);
        var input;
        var fields = ['title','authors','general_keywords','specific_keywords'];
        for(var a=1;a<=4;a++) {
            var value = document.getElementById(fields[a-1]+a).value;
            input = document.createElement("INPUT");
            input.setAttribute("type","hidden");
            input.setAttribute("value",value);
            input.setAttribute("name", fields[a-1]);
            form.appendChild(input);
        }
        if (confirm('Confirm Edit?')) {
            form.setAttribute("action","papers/editpaper.php");
            button.setAttribute("type","submit");
        }
    }

    function delete_paper(id, button ){
        var form = document.getElementById("form"+id);
        if (confirm('Confirm Delete?')) {
            form.setAttribute("action","papers/deletepaper.php");
            button.setAttribute("type","submit");
        }
    }
    
</script>
<?php
    require 'template/footer.php';
?>