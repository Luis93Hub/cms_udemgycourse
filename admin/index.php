<?php include "includes/admin_header.php"; ?>
    <div id="wrapper">

        <!-- Navigation -->

        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php
 $query = "SELECT * FROM posts";
 $select_all_post = mysqli_query($connection, $query);
 $post_counts = mysqli_num_rows($select_all_post);
echo "<div class='huge'>{$post_counts}</div>";
?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php
 $query = "SELECT * FROM comments";
 $select_all_comments = mysqli_query($connection, $query);
 $comment_count = mysqli_num_rows($select_all_comments);
echo "<div class='huge'>{$comment_count}</div>";
?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php
 $query = "SELECT * FROM users";
 $select_all_users = mysqli_query($connection, $query);
 $user_count = mysqli_num_rows($select_all_users);
echo "<div class='huge'>{$user_count}</div>";
?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php
 $query = "SELECT * FROM categories";
 $select_all_categories = mysqli_query($connection, $query);
 $category_count = mysqli_num_rows($select_all_categories);
echo "<div class='huge'>{$category_count}</div>";
?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
    <?php
    $query = "SELECT * FROM posts WHERE post_status = 'published'";
    $select_all_published_post = mysqli_query($connection, $query);
    $post_published_count = mysqli_num_rows($select_all_published_post);


    $query = "SELECT * FROM posts WHERE post_status = 'draft'";
    $select_all_draft_post = mysqli_query($connection, $query);
    $post_draft_counts = mysqli_num_rows($select_all_draft_post);

    $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
    $unapproved_comments_query = mysqli_query($connection, $query);
    $unapproved_comment_count = mysqli_num_rows($unapproved_comments_query);

    $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
    $select_all_subscribers = mysqli_query($connection, $query);
    $subscriber_count = mysqli_num_rows($select_all_subscribers);
    ?>
                <div class="rows">
                    <script>
                        google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawColColors);

function drawColColors() {
       var data = google.visualization.arrayToDataTable([
         ['Element', 'Count', { role: 'style' }],
<?php
    $element_text = ['All Posts', 'Active Posts', 'Draft Posts' , 'Comments', 'Pending Comments', 'Users', 'Subscribers', 'Categories'];
    $element_count = [$post_counts, $post_published_count, $post_draft_counts, $comment_count, $unapproved_comment_count, $user_count, $subscriber_count, $category_count];
for ($i = 0; $i < 8; $i++) {
    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}" . "," . "'#b87333'], ";
}
?>

        //  ['Copper', 8.94, '#b87333'],            // RGB value
        //  ['Silver', 10.49, 'silver'],            // English color name
        //  ['Gold', 19.30, 'gold'],
        //  ['Platinum', 21.45, 'color: #e5e4e2' ], // CSS-style declaration
      ]);

      var options = {
        title: '',
        colors: ['#9575cd', '#33ac71'],
        hAxis: {
          title: '',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: ''
        }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
                    </script>
                      <div id="chart_div"
                        style="
                        width: 'auto';
                        height: 300px; ">
                      </div>

                </div>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
