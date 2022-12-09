<?php
    include "topbit.php";

$showall_sql="SELECT * FROM `2020_L1_assessment_AreOsm` ORDER BY `2020_L1_assessment_AreOsm`.`Meal` ASC";
$showall_query=mysqli_query($dbconnect, $showall_sql);
$showall_rs=mysqli_fetch_assoc($showall_query);
$count=mysqli_num_rows($showall_query);
?>
        
<div class="box main">

    <h2>All Items</h2>

    <?php

    // check if there are any results

    if($count<1)

    {
    ?>

    <div class="error">
        Sorry! There are no results that match your search. Please use the search box in the sidebar to try again.
    </div>

    <?php

    } // end count 'if'

    // if there are no results, output an error

    else {

        do {

        ?>

        <div class="results">

        <p>Dish: <span class="sub_heading"><?php echo $showall_rs['Meal']; ?></span></p>

        <p>Meal-time: <span class="sub_heading"><?php echo $showall_rs['Time']; ?></span></p>

        <p>Location: <span class="sub_heading"><?php echo $showall_rs['Location']; ?></span></p>
            
        <p>Vegetarian: <span class="sub_heading">
            
            <?php 
            if ( $showall_rs['Vegetarian'] ==1)
                {
            ?>
                <span class="sub_heading">Yes</span>
            <?php   }
            else if ( $showall_rs['Vegetarian'] ==0)
                {
            ?>
                <span class="sub_heading">No</span>
            <?php  } ?>
            
            </span></p>

        <p>Rating: 
            <span class="sub_heading">

            <!-- Font Awesome Icon Library -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <?php 

            if ( $showall_rs['Rating'] ==5)
                {
            ?>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            <?php   }

            else if ( $showall_rs['Rating'] ==4)
                {
            ?>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
            <?php   }

            else if ( $showall_rs['Rating'] ==3)
                {
            ?>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            <?php   }   
            
            else if ( $showall_rs['Rating'] ==2)
                {
            ?>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            <?php   }   ?>


            </span>
        </p>

        <p><span class="sub_heading">Review / Response</span></p>

        <p>
            <?php echo $showall_rs['Review']; ?>
        </p>

    </div> <!-- /end results div -->
    <br />        

    <?php

        } // end of 'do'

        while($showall_rs=mysqli_fetch_assoc($showall_query));

    } // end else



    // if there are results, display them

    ?>

</div>    <!-- / main -->

<?php
    include "bottombit.php";
?>