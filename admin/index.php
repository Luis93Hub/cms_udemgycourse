<?php include "includes/admin_header.php"; ?>
<?php //include "../admin/functions.php" ?>
<?php
$post_count = count_records(get_all_user_posts());
$comment_count = count_records(get_all_posts_user_comments());
$categories_count = count_records(get_all_user_categories());
$post_published_count = count_records(get_all_user_published_posts());
$post_draft_counts = count_records(get_all_user_draft_posts());
$approved_comment_count = count_records(get_all_approved_posts_comments());
$unapproved_comment_count = count_records(get_all_unapproved_posts_comments());
$category_count = 0;
?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        <small>Role: Admin:</small>
                            Welcome to admin <?php echo strtoupper(get_user_name()); ?>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php echo "<div class='huge'>" . $post_count . "</div>" ?>
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
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php echo "<div class='huge'>{$comment_count}</div>";
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
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $categories_count; ?>
                    </div>
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

    ?>
                 <div class="rows">
                    <script>
                        google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawColColors);

function drawColColors() {
       var data = google.visualization.arrayToDataTable([
         ['Element', 'Count', { role: 'style' }],
<?php
    $element_text = ['All Posts', 'Active Posts', 'Draft Posts' , 'Comments', 'Approved Comments','Pending Comments', 'Categories'];
    $element_count = [$post_count, $post_published_count, $post_draft_counts, $comment_count, $approved_comment_count, $unapproved_comment_count, $category_count];
for ($i = 0; $i < 6; $i++) {
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
