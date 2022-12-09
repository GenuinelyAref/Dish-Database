<!DOCTYPE HTML>

<html lang="en">

<?php
    session_start();
    include "config.php";
    include "functions.php";
    
    // Connect to database...
    
    $dbconnect=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if(mysqli_connect_errno())
        
    {
        echo "Connection failed:".mysqli_connect_error();
        exit;
    }
    
?>
    
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Put Content Here">
    <meta name="keywords" content="Put keywords here">
    <meta name="author" content="Put your name here">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Orange Reviews</title>
    
    <!-- Edit the link below / replace with your chosen google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu" rel="stylesheet"> 
    
    <!-- Website CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/food_style.css"> 
    
    <!-- Custom website icon (favicon) -->
    <link href="Images/orange.png" rel="icon" type="image/icon" sizes="32x32">
    
</head>
    
<body>
    
    <div class="wrapper">
    

        
        <div class="box banner">
            
        <!-- logo image linking to home page goes here -->
        <a href="index.php">
            <div class="box logo"  title="Logo - Click here to go to the Home Page">
            <img class="img-circle" src="Images/sandwich_resized.png" alt="generic logo" />
            
            </div>    <!-- / logo -->
        </a>
            
            <h1>Orange Reviews</h1>
        </div>    <!-- / banner -->      
        
        <div class="box side">
            <h2>Search | <a class="side" href="show_all.php">Show All</a></h2>
            
            <i>Type part of the dish name if desired</i>
            
            <hr />
            
            <!-- Start of Dish Search -->
            <form method ="post" action="dish_search.php" enctype="multipart/form-data">
                
                <input class="search" type="text" name="dish" size="40" value="" required placeholder="Dish..." />
                
                <input class="submit" type="submit" name="find_dish" value="&#xf002;" />
            
            </form>
            
            <!-- End of Dish Search -->
            
            <hr />
            <i>Use the dropdown menus to search by meal-time, location, vegeterian dishes or by rating</i>
            <hr/>
            
            <!-- Start of Meal-time Search -->
            <form method ="post" action="time_search.php" enctype="multipart/form-data">
                
                <select name="time" required class="search">
                    <option value="" disabled selected>Meal-time...</option>
                    <?php
                    // retrieve unique values in time column..
                    $time_sql="SELECT DISTINCT `Time` FROM `2020_L1_assessment_AreOsm` ORDER BY `2020_L1_assessment_AreOsm`.`Time` ASC";
                    $time_query=mysqli_query($dbconnect, $time_sql);
                    $time_rs=mysqli_fetch_assoc($time_query);
                    
                    
                    do {
                        
                        ?>
                        
                    <option value="<?php echo $time_rs['Time']; ?>"><?php echo $time_rs['Time']; ?></option>
                    
                    <?php
                        
                    } // end of time option retrieval
                    
                    while($time_rs=mysqli_fetch_assoc($time_query));
                    
                    ?>
                                        
                </select>
                
                <input class="submit" type="submit" name="find_time" value="&#xf002;" />
                
                
            
            </form>
            <!-- End of Meal-time Search -->
            
            <!-- Start of Location Search -->
            <form method ="post" action="location_search.php" enctype="multipart/form-data">
                
                <select name="location" required class="search">
                    <option value="" disabled selected>Location...</option>
                    <?php
                    // retrieve unique values in location column..
                    $location_sql="SELECT DISTINCT `Location` FROM `2020_L1_assessment_AreOsm` ORDER BY `2020_L1_assessment_AreOsm`.`Location` ASC";
                    $location_query=mysqli_query($dbconnect, $location_sql);
                    $location_rs=mysqli_fetch_assoc($location_query);
                    
                    
                    do {
                        
                        ?>
                        
                    <option value="<?php echo $location_rs['Location']; ?>"><?php echo $location_rs['Location']; ?></option>
                    
                    <?php
                        
                    } // end of location option retrieval
                    
                    while($location_rs=mysqli_fetch_assoc($location_query));
                    
                    ?>
                                        
                </select>
                
                <input class="submit" type="submit" name="find_location" value="&#xf002;" />
                
                
            
            </form>
            <!-- End of Location Search -->
            
            
            <!-- Start of Vegetarian Search -->
            <form method ="post" action="vegetarian_search.php" enctype="multipart/form-data">
                
                <select name="vegetarian" required class="search">
                    <option value="" disabled selected>Vegetarian...</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    
                    
                    
                </select>
                
                <input class="submit" type="submit" name="find_vegetarian" value="&#xf002;" />
            
                
            </form>
            <!-- End of Location Search -->
            
            
            <!-- Start of Ratings form -->
            <hr /><strong> Rating Search</strong>
            <form method="post" action="rating_search.php" enctype="multipart/form-data">
                
                <select class="half_width" name="amount">
                    <option value="exactly" selected>Exactly...</option>
                    <option value="more">At least...</option>
                    <option value="less">At most... </option>
                
                </select>
                
                <select class="half_width" name="stars">
                    <option value=1>&#9733;</option> 
                    <option value=2>&#9733;&#9733;</option> 
                    <option value=3 selected>&#9733;&#9733;&#9733;</option> 
                    <option value=4>&#9733;&#9733;&#9733;&#9733;</option> 
                    <option value=5>&#9733;&#9733;&#9733;&#9733;&#9733;</option> 
                </select>
                        
                <input type="submit" class="submit" name="find_rating" value="&#xf002;" />
                
                
            </form>
            <!-- end of ratings form -->
            
        </div> <!-- / side bar-->